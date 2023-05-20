<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BECategoryCotroller extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', [
            'data' => $categories
        ]);
    }

    public function save(Request $request){
        $category = new  Category();
        $slug = $this->slugConvert($request->name);
        $num = 2;
        if(Category::where('slug', $slug)->exists()){
            $new_slug = $slug.'-'.$num;
            while(Category::where('slug', $new_slug)->exists()){
                $num++;
                $new_slug = $slug.'-'.$num;
            }
            $slug =  $slug.'-'.$num;
        }
        $category->fill([
           'name' => $request->name,
           'slug' => $slug,
           'sort' => Category::max('sort') + 1
        ]);
       $category->save();

       return redirect()->back()->with('msg', 'Thêm danh mục thành công');
    }

    public function change_status($id){
        $category = Category::select('appear')->where('id', $id)->first();
        if ($category->appear == 1) {
            $appear = 0;
        } else {
            $appear = 1;
        }

        Category::where('id', $id)->update(['appear' => $appear]);

      return response()->json([]);

    }

    public function delete(Request $request){
        $category = Category::where('id' , $request->item_id)->first();
        $category->delete();
        return redirect()->back()->with('msg', 'Xóa thành công');
    }

    public function update_ (Request $request, $id){
        $cate = Category::find($id);
        $img_url = $this->get_img_url($cate->image);
        $cate->image = $img_url;
        return response()->json($cate);
    }

    public function update(Request $request){
        $category = Category::where('id' , $request->item_id)->first();
        if(empty($_POST['slug'])){$slug = $this->slugConvert($_POST['name']);}
        else{$slug = $this->slugConvert($_POST['slug']);}
        $num = 2;
        if(Category::where('slug', $slug)->where('id', '!=', $request->item_id)->exists()){
            $new_slug = $slug.'-'.$num;
            while(Category::where('slug', $new_slug)->exists()){
                $num++;
                $new_slug = $slug.'-'.$num;
            }
            $slug =  $slug.'-'.$num;
        }
        $category->fill([
            'name' => $request->name,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'slug' => $slug
        ]);
        $category->save();
        return redirect()->back()->with('msg', 'Cập nhật thành công');
    }
}
