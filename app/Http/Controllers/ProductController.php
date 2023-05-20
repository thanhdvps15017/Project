<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\ProductComment;

class ProductController extends Controller
{
    function shop()
    {
        $page = DB::table('pages')->where('name', 'Sản phẩm')->first();
        $page_meta = DB::table('page_meta')->where('page_id', $page->id)->get();
        $products = DB::table('products')->where('appear', 1)->latest()->Paginate(12);
        $cats = DB::table('product_categories')->orderby('sort', 'asc')->where('appear', 1)->get();
        $brands = DB::table('brands')->orderby('sort', 'asc')->where('appear', 1)->get();
        $footer = $this->footer();
        $data = ['footer' => $footer, 'products' => $products, 'cats' => $cats, 'brands' => $brands, 'page_meta' => $page_meta, 'page' => $page];
        return view('client.shop', $data);
    }
    function single_product($slug)
    {
        $page = DB::table('pages')->where('name', 'Sản phẩm')->first();
        $page_meta = DB::table('page_meta')->where('page_id', $page->id)->get();
        $products = Product::where('slug', $slug)->first();
        $id = $products->id;
        $productLimit = DB::table('products')->where('pr_category_id', '=', $products->pr_category_id)->where('appear', 1)->limit(6)->get();
        $comments = DB::table('product_comments')->where('appear', 1)->where('product_id', $id)->get();

        $brands = DB::table('brands')->where('id', '=', $products->brand_id)->get();
        $cats = DB::table('product_categories')->where('id', '=', $products->pr_category_id)->get();

        $footer = $this->footer();
        $data = ['comments' => $comments, 'footer' => $footer, 'products' => $products, 'brands' => $brands, 'cats' => $cats, 'productLimit' => $productLimit, 'page_meta' => $page_meta];

        if ($products->appear == 0) {
            return redirect('shop');
        } else {
            return view("client.single-product", $data);
        }
    }
    public function search(Request $request)
    {
        $keyword = $request->q;
        $footer = $this->footer();
        $products = Product::where('name', 'like', '%' . $keyword . '%')->where('appear', 1)->get();
        $data = ['footer' => $footer, 'products' => $products];
        return view('client.search', $data);
    }

    function filter()
    {
        $cat_id = $_POST['pd_cat'];
        $brand = $_POST['brand'];
        $sortby = $_POST['sort_by'];
        $sort = $_POST['sort'];
        if ($brand != 'all' && $cat_id == 'all') {
            $products = DB::table('products')->where('brand_id', $brand)->where('appear', 1)->orderBy($sortby, $sort)->Paginate(12);
        } elseif ($brand == 'all' && $cat_id != 'all') {
            $products = DB::table('products')->where('pr_category_id', $cat_id)->where('appear', 1)->orderBy($sortby, $sort)->Paginate(12);
        } elseif ($brand != 'all' && $cat_id != 'all') {
            $products = DB::table('products')->where([
                ['pr_category_id', $cat_id],
                ['brand_id', $brand],
            ])->where('appear', 1)->orderBy($sortby, $sort)->Paginate(12);
        } else {
            $products = DB::table('products')->where('appear', 1)->orderBy($sortby, $sort)->Paginate(12);
        }
        return view('Modals.shop', compact('products'));
    }
    function addComment(Request $request)
    {
        $pd = new ProductComment;

        $pd->product_id = $request->pd_id;
        $pd->user_id = Auth()->id();
        $pd->message = $request->message;
        $pd->created_at = now();

        $pd->save();
        return false;
    }
}