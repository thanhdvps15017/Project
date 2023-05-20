<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\Media;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use DB;
use App\Models\coupon;

class AdminController extends Controller
{
    function dashboard(){
        // Đếm sản phẩm
        $pd_list = DB::table('products')->whereYear('created_at', date('Y'))->get();
        $pd_details = DB::table('product_details')->get();
        // Đếm use
        $user_list = DB::table('users')->get();
        // Đếm đơn hàng
        $orders = DB::table('orders')->whereYear('created_at', date('Y'))->get();
        $order_details = DB::table('order_detail')->whereYear('created_at', date('Y'))->get();
        // Đếm email
        $mail = DB::table('email')->whereYear('created_at', date('Y'))->get();
        // Đếm bình luận
        $n_cmt = DB::table('news_comments')->whereYear('created_at', date('Y'))->get(); // Tin tức
        $pd_cmt = DB::table('product_comments')->whereYear('created_at', date('Y'))->get(); // Sản phẩm
        $data = ['mail' => $mail, 'n_cmt' => $n_cmt, 'pd_cmt' => $pd_cmt, 'pd_list'=>$pd_list, 'pd_details'=>$pd_details, 'user_list' => $user_list, 'orders' => $orders, 'order_details' => $order_details];
        return view("admin/dashboard", $data);
    }
    function contact(){
        $email_list = DB::table('email')->orderBy('created_at', 'desc')->get();
        $data = ['email_list' => $email_list];
        return view("admin/contact/index", $data);
    }
    function contact_delete($id){
        $c = Contact::find($id);
        $c->delete();
        return redirect("admin/contact");
    }
    function coupon(){
        $coupon_list = DB::table('coupon')->orderBy('created_at', 'desc')->get();
        $data = ['coupon_list' => $coupon_list];
        return view("admin/coupon/index", $data);
    }
    function add_coupon(){
        return view("admin/coupon/add");
    }
    function add_coupon_(Request $request){
        $request->validate([
            'coupon_code' => 'required|exists',
            'discount' => 'required|min:0',
            'min_total' => 'required|min:0',
            'quantity' => 'required|min:1',
            'max_discount' => 'required',
            'date_start' => 'required|date|after:today',
            'date_expire' => 'required|date|after:today',
        ],
        [
            'coupon_code.exists' => 'Mã đã tồn tại',
            'coupon_code.required' => 'Vui lòng nhập mã giảm giá',
            'discount.required' => 'Vui lòng nhập số tiền được giảm',
            'min_total.required' => 'Vui lòng nhập giá trị đơn hàng tối thiểu',
            'quantity.required' => 'Vui lòng nhập số lượng mã',
            'max_discount.required' => 'Vui lòng nhập số tiền tối đa được giảm',
            'date_start.required' => 'Vui lòng chọn ngày bắt đầu áp dụng',
            'date_expire.required' => 'Vui lòng chọn ngày hết hạn',
            'date_expire.after' => 'Vui lòng chọn ngày sau hôm nay',
            'date_start.after' => 'Vui lòng chọn ngày sau hôm nay',
            'quantity.min' => 'Vui lòng nhập số lượng lớn hơn 0',
            'min_total.min' => 'Giá trị hoá đơn không được âm',
            'discount.min' => 'Số tiền giảm giá không được âm',
        ]);
        $c = new coupon;
        $c->coupon_code = $_POST['coupon_code'];
        $c->coupon_type = $_POST['coupon_type'];
        $c->description = $_POST['description'];
        $c->discount = $_POST['discount'];
        $c->min_total = $_POST['min_total'];
        $c->max_discount = $_POST['max_discount'];
        $c->date_start = $_POST['date_start'];
        $c->date_expire = $_POST['date_expire'];
        $c->quantity = $_POST['quantity'];
        $c->remaining = $_POST['quantity'];
        $c->created_at = now();
        $c->save();
        return redirect("admin/coupon");
    }
    function update_coupon($id){
        $coupon = DB::table('coupon')->where('id', $id)->first();
        return view("admin/coupon/update", compact('coupon'));
    }
    function update_coupon_($id, Request $request){
        $request->validate([
            'coupon_code' => 'required|exists',
            'discount' => 'required|min:0',
            'min_total' => 'required|min:0',
            'quantity' => 'required|min:1',
            'max_discount' => 'required',
            'date_start' => 'required|date|after:today',
            'date_expire' => 'required|date|after:today',
        ],
        [
            'coupon_code.exists' => 'Mã đã tồn tại',
            'coupon_code.required' => 'Vui lòng nhập mã giảm giá',
            'discount.required' => 'Vui lòng nhập số tiền được giảm',
            'min_total.required' => 'Vui lòng nhập giá trị đơn hàng tối thiểu',
            'quantity.required' => 'Vui lòng nhập số lượng mã',
            'max_discount.required' => 'Vui lòng nhập số tiền tối đa được giảm',
            'date_start.required' => 'Vui lòng chọn ngày bắt đầu áp dụng',
            'date_expire.required' => 'Vui lòng chọn ngày hết hạn',
            'date_expire.after' => 'Vui lòng chọn ngày sau hôm nay',
            'date_start.after' => 'Vui lòng chọn ngày sau hôm nay',
            'quantity.min' => 'Vui lòng nhập số lượng lớn hơn 0',
            'min_total.min' => 'Giá trị hoá đơn không được âm',
            'discount.min' => 'Số tiền giảm giá không được âm',
        ]);
        $c = coupon::find($id);
        $c->coupon_code = $_POST['coupon_code'];
        $c->coupon_type = $_POST['coupon_type'];
        $c->description = $_POST['description'];
        $c->discount = $_POST['discount'];
        $c->min_total = $_POST['min_total'];
        $c->max_discount = $_POST['max_discount'];
        $c->date_start = $_POST['date_start'];
        $c->date_expire = $_POST['date_expire'];
        $c->quantity = $_POST['quantity'];
        $c->updated_at = now();
        $c->save();

        return redirect("admin/coupon");
    }
    function delete_coupon($id){
        $c = coupon::find($id);

        $c->delete();
        return redirect("admin/coupon");
    }
    function media(){
        $medias = DB::table('media')->orderBy('created_at', 'desc')->get();
        return view('admin/media/index', compact('medias'));
    }
    function upload(Request $request){
        $array = [];
        $request->validate(
            ['image' => 'required', 'image.*' => 'max:2048'],
            [
                'image.required' => 'Vui lòng chọn file', 
                'image.*.max' => 'Chọn file tối đa 2MB', 
                'image.*.mimes' => 'Vui lòng chọn hình ảnh có định dạng: .jpg, .jpeg, .png, .webp, .gif',
            ]
        );
        foreach ($request->file('image') as $key => $img){
            $imageName = str_replace(" ","-" ,$img->getClientOriginalName());
            $num = 2;
            if(Media::where('name', $imageName)->exists()){
                $name = pathinfo($imageName, PATHINFO_FILENAME);
                $type = $img->getClientOriginalExtension();
                $new_name = $name.'-'.$num;
                while(Media::where('name', $new_name.'.'.$type)->exists()){
                    $num++;
                    $new_name = $name.'-'.$num;
                }
                $imageName =  $name.'-'.$num.'.'.$type;
            }
            $img->move(public_path('images'), $imageName);
            $array[] = ['name' => $imageName, 'url' => 'images/'.$imageName, 'created_at' => now(),];
        }
        Media::insert($array);
        session()->flash('success', 'Image Upload successfully');

        return redirect()->route('admin.media');
    }

    public function popup(){
        $media = DB::table('media')->orderBy('created_at', 'desc')->get();
        return view('admin/media/list', compact('media'));
    }
    public function img_detail($id){
        $image = DB::table('media')->where('id', $id)->first();
        return view('admin/media/detail', compact('image'));
    }

    public function update_img(Request $request){
        $img = Media::find($request->id);
        $img->alt = $request->alt;
        $img->updated_at = now();

        $img->save();
        return false;
//        return view('admin/media/detail', compact('img'));
    }
    public function delete_img($id){
        $img = Media::find($id);

        $img->delete();
        File::delete(public_path($img->url));

        return  redirect('admin/media');
    }
}
