<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BEProductController extends Controller
{

    public function filter(Request $request)
    {

        $price_range = $request->input('price_range');
        $category_id = $request->input('category_id');
        $brand_id = $request->input('brand_id');
        $search = $request->input('search');
        $appear = $request->input('appear');
        $page = $request->input('page', 1);
        $data = Product::select(
            'products.id',
            'products.name as product_name',
            'products.view',
            'products.images',
            'products.quantity',
            'products.bought',
            'products.price_pay',
            'products.price',
            'products.discount',
            'products.appear',
            'product_categories.name as cate_name',
            'brands.name as brand_name'
        )
            ->from('products')
            ->join('product_categories', 'product_categories.id', '=', 'products.pr_category_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->when($category_id, function ($query) use ($category_id) {
                return $query->where('products.pr_category_id', $category_id);
            })
            ->when($brand_id, function ($query) use ($brand_id) {
                return $query->where('products.brand_id', $brand_id);
            })
            ->when($appear != null, function ($query) use ($appear) {
                return $query->where('products.appear', $appear);
            })
            ->when($search, function ($query) use ($search) {
                return $query->where('products.name', 'like', "%$search%");
            })
            ->when($price_range, function ($query) use ($price_range) {
                return $query->where('price', '<=', $price_range);
            })
            ->paginate(10, ['*'], 'page', $page);

        $html = view('Modals.back_end.product_load')
            ->with('products_load', $data)
            ->render();
        return response()->json(['BODY' => $html]);

    }

    public function index()
    {
        $data = Product::query('products')
            ->select(
                'products.id',
                'products.name as name',
                'products.view',
                'products.images',
                'products.quantity',
                'products.bought',
                'products.price',
                'products.discount',
                //            ->select('products.id', 'products.name as name', 'products.view', 'products.price_pay', 'products.images', 'products.bought', 'products.price', 'products.discount',
                'products.appear',
                'product_categories.name as cate_name',
                'brands.name as brand_name'
            )
            ->join('product_categories', 'product_categories.id', '=', 'products.pr_category_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->paginate();
        $brand = Brands::all();
        $Cate = Category::all();
        return view('admin.product.index', compact('data', 'brand', 'Cate'));
    }


    public function add()
    {
        $categorys = Category::all();
        $brands = Brands::all();
        return view('admin.product.add', compact('categorys', 'brands'));
    }

    public function save(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'quantity' => 'required|min:1',
                'price' => 'required|min:1',
                'content' => 'required',
                'images' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
                'quantity.min' => 'Số lượng tối thiểu 1',
                'price.min' => 'Giá không được âm',
                'price.required' => 'Vui lòng nhập giá sản phẩm',
                'content.required' => 'Vui lòng nhập nội dung sản phẩm',
                'images.required' => 'Vui lòng chọn ảnh sản phẩm',
            ]
        );
        $products = new Product();
        $sku = 'PROD-' . Carbon::now()->format('YmdHis');
        if (empty($_POST['slug'])) {
            $slug = $this->slugConvert($_POST['name']);
        } else {
            $slug = $this->slugConvert($_POST['slug']);
        }
        $num = 2;
        if (Product::where('slug', $slug)->exists()) {
            $new_slug = $slug . '-' . $num;
            while (Product::where('slug', $new_slug)->exists()) {
                $num++;
                $new_slug = $slug . '-' . $num;
            }
            $slug = $slug . '-' . $num;
        }
        $products->fill([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'pr_category_id' => $request->pr_category_id,
            'slug' => $slug,
            'contents' => $request->contents,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'price_pay' => $request->price_pay,
            'discount' => $request->discount,
            'keywords' => $request->keywords,
            'sku' => $sku,
            'images' => '[' . str_replace('"', '', json_encode($_POST['images'])) . ']',
        ]);
        $products->save();
        return redirect(route('admin.products'))->with('msg', 'Thêm thành công');
    }

    public function delete(Request $request)
    {
        $product = Product::where('id', $request->item_id)->first();
        $product->delete();
        return redirect()->back()->with('msg', 'Xóa thành công');
    }

    public function change_status(Request $request, $id)
    {
        $product = Product::select('appear')->where('id', $id)->first();
        if ($product->appear == 0) {
            $appear = 1;
        } else {
            $appear = 0;
        }
        Product::where('id', $id)->update(['appear' => $appear]);
        return response()->json([]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $categorys = Category::all();
        $brands = Brands::all();

        $data = ['product' => $product, 'categorys' => $categorys, 'brands' => $brands];
        return view('admin/product/edit', $data);
    }

    public function update_save(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'quantity' => 'required|min:1',
                'price' => 'required|min:1',
                'content' => 'required',
                'images' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
                'quantity.min' => 'Số lượng tối thiểu 1',
                'price.min' => 'Giá không được âm',
                'price.required' => 'Vui lòng nhập giá sản phẩm',
                'content.required' => 'Vui lòng nhập nội dung sản phẩm',
                'images.required' => 'Vui lòng chọn ảnh sản phẩm',
            ]
        );
        $products = Product::find($id);
        if (empty($_POST['slug'])) {
            $slug = $this->slugConvert($_POST['name']);
        } else {
            $slug = $this->slugConvert($_POST['slug']);
        }
        $sku = 'PROD-' . Carbon::now()->format('YmdHis');
        $num = 2;
        if (Product::where('slug', $slug)->exists()) {
            $new_slug = $slug . '-' . $num;
            while (Product::where('slug', $new_slug)->exists()) {
                $num++;
                $new_slug = $slug . '-' . $num;
            }
            $slug = $slug . '-' . $num;
        }
        $products->fill([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'pr_category_id' => $request->pr_category_id,
            'slug' => $slug,
            'contents' => $request->contents,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'price_pay' => $request->price_pay,
            'discount' => $request->discount,
            'keywords' => $request->keywords,
            'sku' => $sku,
            'images' => '[' . str_replace('"', '', json_encode($_POST['images'])) . ']',
        ]);
        $products->save();
        //        return redirect(route('admin.products'))->with('msg', 'Cập nhật sản phẩm thành công');
        return redirect('admin/product/update/' . $id)->with('msg', 'Cập nhật sản phẩm thành công');
    }


}