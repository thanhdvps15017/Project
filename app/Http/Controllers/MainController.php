<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use DB;
use App\Models\Email;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    function index(){
        $page = DB::table('pages')->where('name', 'Trang chủ')->first();
        $page_meta = DB::table('page_meta')->where('page_id', $page->id)->get();
        foreach ($page_meta as $val){
            switch($val->meta_key){
                case 'choose_pd_sec_1':
                    if(!empty($val->meta_value)) {
                        $pd_arr = json_decode($val->meta_value);
                        $products = DB::table('products')->whereIn('id', $pd_arr)->get();
                    }
                    else{
                        $products = DB::table('products')->limit(9)->get();
                    }
                    break;
                case 'choose_news_sec_4':
                    if(!empty($val->meta_value)) {
                        $news_arr = json_decode($val->meta_value);
                        $news = DB::table('news')->whereIn('id', $news_arr)->get();
                    }
                    else{
                        $news = DB::table('news')->limit(5)->get();
                    }
                    break;
                case 'brands_sec_5':
                    if(!empty($val->meta_value)) {
                        $brand_arr = json_decode($val->meta_value);
                        $brands = DB::table('brands')->select('name', 'image', 'slug')->whereIn('id', $brand_arr)->get();
                    }
                    else{
                        $brands = DB::table('brands')->select('name', 'image', 'slug')->get();
                    }
                    break;
            }
        }
        $footer = $this->footer();
        $data = ['footer'=>$footer, 'products'=>$products, 'news'=>$news ,'page' => $page, 'page_meta' => $page_meta, 'brands' => $brands];
        return view("client/home", $data);
    }
    function contact(){
        $page = DB::table('pages')->where('name', 'Liên hệ')->first();
        $page_meta = DB::table('page_meta')->where('page_id', $page->id)->get();
        $footer = $this->footer();
        $data = ['footer'=>$footer, 'page' => $page, 'page_meta' => $page_meta];
        return view("client/contact", $data);
    }
    function sendContact(Request $request){
        $request->validate([
            'name' => ['required'],
            'phone' => 'digits_between:9,10',
            'email' => 'required|email',
            'message' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên của bạn',
            'phone.required'=> 'Vui lòng nhập số điện thoại',
            'phone.digits_between'=>'Định dạng số điện thoại không đúng!',
            'message.required'=> 'Vui lòng nhập nội dung lời nhắn',
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email' => 'Vui lòng nhập đúng định dạng email'
        ]);
        $mail = new Email;
        $mail->name = $_POST['name'];
        $mail->phone = $_POST['phone'];
        $mail->email = $_POST['email'];
        $mail->message = $_POST['message'];
        $mail->save();
        $data = [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
        ];
        Mail::mailer('mailgun')
            ->to('contact.beeswatch@gmail.com')
            ->send( new contactMail($data) );
        Mail::mailer('mailgun')
            ->to('contact@beeswatch.online')
            ->send( new contactMail($data) );
        return redirect("/contact");
    }
    function about(){
        $page = DB::table('pages')->where('name', 'Giới thiệu')->first();
        $page_meta = DB::table('page_meta')->where('page_id', $page->id)->get();
        $footer = $this->footer();
        $data = ['footer'=>$footer, 'page' => $page, 'page_meta' => $page_meta];
        return view("client/about", $data);
    }
    function news(){
        $page = DB::table('pages')->where('name', 'Tin tức')->first();
        $page_meta = DB::table('page_meta')->where('page_id', $page->id)->get();
        foreach ($page_meta as $val){
            switch ($val->meta_key){
                case'choose_news_cat':
                    if(!empty($val->meta_value)){
                        $cat_arr = json_decode($val->meta_value);
                        $cat = DB::table('news_categories')->whereIn('id', $cat_arr)->get();
                    }
                    else{$cat = DB::table('news_categories')->orderby('sort', 'asc')->where('appear', 1)->get();}
                    break;
                case 'choose_hot_posts':
                    if(!empty($val->meta_value)){
                        $news_arr = json_decode($val->meta_value);
                        $hot_news = DB::table('news')->whereIn('id', $news_arr)->get();
                    }
                    else{$hot_news = DB::table('news')->orderby('created_at', 'desc')->where('appear', 1)->limit(5)->get();}
                    break;
            }
        }
        $footer = $this->footer();
        $news = DB::table('news')->orderby('created_at', 'desc')->where('appear', 1)->Paginate(6);
        $data = ['footer'=>$footer, 'cat'=>$cat, 'news' => $news, 'page'=> $page, 'page_meta' => $page_meta,'hot_news' => $hot_news ];
        return view('client.news', $data);
    }
    function search(){
        if(isset($_GET['s']) && $_GET['s'] != '') {
            $s_val = $_GET['s'];
            $news_list = DB::table('news')
                ->where('title', 'LIKE', '%' . $s_val . '%')
                ->orWhere('content', 'LIKE', '%' . $s_val . '%')
                ->get();
            $pd_list = DB::table('products')
                ->where('name', 'LIKE', '%' . $s_val . '%')
                ->orWhere('content', 'LIKE', '%' . $s_val . '%')
                ->get();
            $footer = $this->footer();
            $data = ['footer'=>$footer, 'pd_list' => $pd_list, 'news_list' => $news_list];
            return view("client/search", $data);
        }
        else{
            return redirect('/');
        }
    }
}
