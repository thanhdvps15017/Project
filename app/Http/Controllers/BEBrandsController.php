<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BEBrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        return view('admin.brands.index', [
            'data' => $brands
        ]);
    }

    public function save(Request $request)
    {
        $Brand = new  Brands();
        if(empty($_POST['slug'])){$slug = $this->slugConvert($_POST['name']);}
        else{$slug = $this->slugConvert($_POST['slug']);}
        $num = 2;
        if(Brands::where('slug', $slug)->exists()){
            $new_slug = $slug.'-'.$num;
            while(Brands::where('slug', $new_slug)->exists()){
                $num++;
                $new_slug = $slug.'-'.$num;
            }
            $slug =  $slug.'-'.$num;
        }
        $Brand->fill([
            'name' => $request->name,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'appear' => $request->appear,
            'image' => $request->image,
            'sort' => Brands::max('sort') + 1,
            'slug' => $slug
        ]);
        $Brand->save();
        return redirect()->back()->with('msg', 'Thêm danh mục thành công');
    }

    public function change_status($id)
    {
        $brands = Brands::select('appear')->where('id', $id)->first();

        if ($brands->appear == 1) {
            $appear = 0;
        } else {
            $appear = 1;
        }
        Brands::where('id', $id)->update(['appear' => $appear]);

        return response()->json([]);

    }

    public function delete(Request $request)
    {
        $brands = Brands::where('id', $request->item_id)->first();
        $brands->delete();
        return redirect()->back()->with('msg', 'Xóa thành công');
    }

    public function update(Request $request, $id){
        $brands = Brands::find($id);
        $img_url = $this->get_img_url($brands->image);
        $brands->image_url = $img_url;
        return response()->json($brands);
    }

    public function save_update(Request $request)
    {
        $brands = Brands::where('id', $request->item_id)->first();
        if(empty($_POST['slug'])){$slug = $this->slugConvert($_POST['name']);}
        else{$slug = $this->slugConvert($_POST['slug']);}
        $num = 2;
        if(Brands::where('slug', $slug)->exists()){
            $new_slug = $slug.'-'.$num;
            while(Brands::where('slug', $new_slug)->exists()){
                $num++;
                $new_slug = $slug.'-'.$num;
            }
            $slug =  $slug.'-'.$num;
        }
        $brands->fill([
            'name' => $request->name,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'appear' => $request->appear,
            'sort' => Brands::max('sort') + 1,
            'slug' => $slug
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/brands/'), $imageName);
            $brands->image = 'image/brands/' . $imageName;
            $brands->save();
        }

        $brands->save();
        return redirect()->back()->with('msg', 'Cập nhật thành công');
    }

}
