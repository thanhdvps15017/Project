<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\NewsCategories;
use App\Models\NewsComment;
use DB;

class NewsController extends Controller
{
    public function filter(Request $request){
        $category_id = $request->input('category_id');
        $search = $request->input('search');
        $appear = $request->input('appear');
        $hot = $request->input('hot');
        $page = $request->input('page', 1);

        $news_list = DB::table('news')
            ->orderBy('id','desc')
            ->when($category_id, function ($query) use ($category_id) {
                return $query->where('category_id', $category_id);
            })
            ->when($appear != null, function ($query) use ($appear) {
                return $query->where('appear', $appear);
            })
            ->when($hot != null, function ($query) use ($hot) {
                return $query->where('hot', $hot);
            })
            ->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', "%$search%");
            })
            ->paginate(10, ['*'], 'page', $page);

        $author = DB::table('users')->select('name', 'id')->get();
        $cat_list = DB::table('news_categories')->select('name', 'id')->get();
        $html = view('Modals.back_end.new_load')
            ->with(['news_list'=>$news_list, 'author' => $author, 'cat_list' => $cat_list,])
            ->render();
        return response()->json(['BODY' => $html]);
    }

//    public function index(){
//        $news = DB::table('news')->Paginate(12);
//        $cat = DB::table('news_categories')->get();
//        $data = ['cat'=>$cat, 'news' => $news];
//        return view('client.news', $data);
//    }

    public function single_news($slug){
        $page = DB::table('pages')->where('name', 'Tin tức')->first();
        $page_meta = DB::table('page_meta')->where('page_id', $page->id)->get();
        foreach ($page_meta as $val){
            switch ($val->meta_key){
                case 'banner_image_detail':
                    $banner_image = $val->meta_value;
                break;
            }
        }
        $kq = DB::table('news')->WHERE('slug', $slug)->first();
        $list = DB::table('news')->limit(5)->get();
        $footer = $this->footer();
        $data = ['footer'=>$footer, 'list'=>$list, 'kq' => $kq, 'banner_image' => $banner_image];
        if($kq->appear == 0){return redirect('news');}
        else{return view("client.single-news", $data);}
    }
    function news_list(){
        $news_list = DB::table('news')
            ->orderBy('created_at','desc')
            ->Paginate(5);
        $cata  = NewsCategories::all();
        $author = DB::table('users')->select('name', 'id')->get();
        $cat_list = DB::table('news_categories')->select('name', 'id')->get();
        $data = ['news_list'=>$news_list, 'author' => $author, 'cat_list' => $cat_list, 'cate_all' => $cat_list];
        return view("admin/news/index", $data);
    }
    function add(){
        $cat = DB::table('news_categories')->get();
        return view("admin/news/add", ['cat'=> $cat]);
    }
    function add_(Request $request){
        $request->validate(
            [
                'title' => 'required',
                'image' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề tin',
                'image.required' => 'Vui lòng chọn hình ảnh',
                'content.required' => 'Vui lòng nhập nội dung bài viết',
            ]
        );
        $n = new News;
        $n->hot = $_POST['hot'];
        $n->category_id = $_POST['category_id'];
        $n->user_id = 1;
        $n->image = $_POST['image'];
        $n->title = $_POST['title'];
        if(empty($_POST['slug'])){
            $n->slug = $this->slugConvert($_POST['title']);
        }
        else{
            $n->slug = $this->slugConvert($_POST['slug']);
        }
        $n->keywords = $_POST['keywords'];
        $n->summary = $_POST['summary'];
        $n->content = $_POST['content'];
        $n->appear = $_POST['appear'];
        $n->created_at = now();
        $num = 2;
        if(News::where('slug', $n->slug)->exists()){
            $new_slug = $n->slug.'-'.$num;
            while(News::where('slug', $new_slug)->exists()){
                $num++;
                $new_slug = $n->slug.'-'.$num;
            }
            $n->slug =  $n->slug.'-'.$num;
        }
        $n->save();
        return redirect('admin/news');
    }
    function hot($id){
        $news = News::find($id);
        if($news->hot == 0){$news->hot = 1;}
        else{$news->hot = 0;}
        $news->updated_at = now();
        $news->save();
        return response()->json([]);
    }
    function appear($id){
        $news = News::find($id);
        if($news->appear == 0){$news->appear = 1;}
        else{$news->appear = 0;}
        $news->updated_at = now();
        $news->save();
      return response()->json([]);
    }
    function update($id){
        $n = News::find($id);
        $cat = DB::table('news_categories')->get();
        return view('admin/news/update', ['news'=>$n, 'cat'=> $cat]);
    }
    function update_($id, Request $request){
        $request->validate(
            [
                'title' => 'required',
                'image' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề tin',
                'image.required' => 'Vui lòng chọn hình ảnh',
                'content.required' => 'Vui lòng nhập nội dung bài viết',
            ]
        );
        $n = News::find($id);
        $n->hot = $_POST['hot'];
        $n->category_id = $_POST['category_id'];
        $n->user_id = 1;
        $n->image = $_POST['image'];
        $n->title = $_POST['title'];
        $n->summary = $_POST['summary'];
        $n->content = $_POST['content'];
        $n->appear = $_POST['appear'];
        if(empty($_POST['slug'])){
            $n->slug = $this->slugConvert($_POST['title']);
        }
        else{
            $n->slug = $this->slugConvert($_POST['slug']);
        }
        $n->keywords = $_POST['keywords'];
        $n->updated_at = now();
        $num = 2;
        if(News::where('slug', $n->slug)->exists()){
            $new_slug = $n->slug.'-'.$num;
            while(News::where('slug', $new_slug)->exists()){
                $num++;
                $new_slug = $n->slug.'-'.$num;
            }
            $n->slug =  $n->slug.'-'.$num;
        }
        $n->save();
        return redirect('admin/news');
    }
    function delete($id){
        $t = News::find($id);
//        if($t == null){
//            return redirect('/thongbao');
//        }
//        else{
        $t->delete();
//        }
        return redirect('admin/news');
    }
    //comment
    public function comment(){
        $newsComments = NewsComment::with('user','news')->paginate();
        return view('admin.news.comment', compact('newsComments'));
    }
    public function change(Request $request){
        $id = $request->input('id');
        $appear = $request->input('appear');
        $newsComment = NewsComment::find($id);
        $newsComment->appear = $appear;
        $newsComment->save();
        return response()->json(['success' => true, 'status' => 'OK']);
    }
    public function destroy(Request $request){
        $newsCommentDelete = NewsComment::findOrFail($request->id);
        $newsCommentDelete->delete();
        return response()->json(['success' => true]);
    }
}
