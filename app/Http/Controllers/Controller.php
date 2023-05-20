<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function footer(){
        $footer_meta = DB::table('page_meta')->where("page_id", 999)->get();
        foreach ($footer_meta as $item){
            switch ($item->meta_key){
                case 'choose_pd_cat_footer':
                    if(!empty($item->meta_value)) {
                        $arr = json_decode($item->meta_value);
                        $pd_cat_footer = DB::table('product_categories')->whereIn('id', $arr)->get();
                    }
                    else{$pd_cat_footer = DB::table('product_categories')->limit(3)->get();}
                    break;
                case 'choose_news_cat_footer':
                    if(!empty($item->meta_value)) {
                        $arr = json_decode($item->meta_value);
                        $news_cat_footer = DB::table('news_categories')->whereIn('id', $arr)->get();
                    }
                    else{$news_cat_footer = DB::table('news_categories')->limit(3)->get();}
                    break;
            }
        }
        $footer = ['footer_meta' => $footer_meta, 'pd_cat_footer' => $pd_cat_footer, 'news_cat_footer' => $news_cat_footer];
        return $footer;
    }
    public function slugConvert($text){
        $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
        $text = str_replace(array("?", "&amp;", '_', ':', '+', '?', '&quote', '!', '&lt;', '&gt;', '(', ')', '[', ']', '&ldquo;', '&rdquo;', '&sbquo;', '.', ',', '/', '&bdquo;'), '-', $text);
        $text = str_replace(" ", '-', str_replace("&*#39;", '', $text));
        $text = str_replace("----", '-', $text);
        $text = str_replace("---", '-', $text);
        $text = str_replace("--", '-', $text);
        $text = str_replace("..", '-', $text);
        $text = str_replace("/.../", '-', $text);
        $text = str_replace("....", '-', $text);
        $text = str_replace(".....", '-', $text);
        $text = ltrim($text, "-");
        $text = rtrim($text, "-");
        $text = str_replace(" ", "-", $text);
        $text = str_replace("--", "-", $text);
        $text = str_replace("@", "-", $text);
        $text = str_replace("/", "-", $text);
        $text = str_replace("\\", "-", $text);
        $text = str_replace(":", "", $text);
        $text = str_replace("\"", "", $text);
        $text = str_replace("'", "", $text);
        $text = str_replace("<", "", $text);
        $text = str_replace(">", "", $text);
        $text = str_replace(",", "", $text);
        $text = str_replace("?", "", $text);
        $text = str_replace(";", "", $text);
        $text = str_replace(".", "", $text);
        $text = str_replace("[", "", $text);
        $text = str_replace("]", "", $text);
        $text = str_replace("(", "", $text);
        $text = str_replace(")", "", $text);
        $text = str_replace("́", "", $text);
        $text = str_replace("̀", "", $text);
        $text = str_replace("̃", "", $text);
        $text = str_replace("̣", "", $text);
        $text = str_replace("̉", "", $text);
        $text = str_replace("*", "", $text);
        $text = str_replace("!", "", $text);
        $text = str_replace("$", "-", $text);
        $text = str_replace("&", "-and-", $text);
        $text = str_replace("%", "", $text);
        $text = str_replace("#", "", $text);
        $text = str_replace("^", "", $text);
        $text = str_replace("=", "", $text);
        $text = str_replace("+", "", $text);
        $text = str_replace("~", "", $text);
        $text = str_replace("`", "", $text);
        $text = str_replace("--", "-", $text);
        $text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
        $text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
        $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
        $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
        $text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
        $text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
        $text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
        $text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
        $text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
        $text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
        $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
        $text = preg_replace("/(đ)/", 'd', $text);
        $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
        $text = preg_replace("/(đ)/", 'd', $text);
        $text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
        $text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
        $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
        $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
        $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
        $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
        $text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
        $text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
        $text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
        $text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
        $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
        $text = preg_replace("/(Đ)/", 'D', $text);
        $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
        $text = preg_replace("/(Đ)/", 'D', $text);
        $text = strtolower($text);
        return $text;
    }
    public static function get_img_attachment($id){
        $image = DB::table('media')->where('id', $id)->first();
        list($width, $height, $type, $attr) = getimagesize($image->url);

        if(!empty($image)){
            $html = '<img width="'.$width.'" height="'.$height.'" src="'.asset($image->url).'" alt="'.$image->alt.'"/>';
        }
        else{
            $html = '<img src="" alt=""/>';
        }
        return $html;
    }
    public static function get_img_url($id){
        $image = DB::table('media')->where('id', $id)->first();
        if(!empty($image)){
            $url = $image->url;
        }
        else {
            $url = '';
        }
        return $url;
    }
    public static function get_user_by_id($id){
        $user = DB::table('users')->select('name', 'avatar')->where('id', $id)->first();
        return $user;
    }
    public static function get_product($id){
        $product = DB::table('products')->where('id', $id)->first();
        if(!empty($product)) {
            return $product;
        }
        else{
            return '';
        }
    }
// {!! App\Http\Controllers\Controller::get_img_attachment($id)!!}
// {!! App\Http\Controllers\Controller::get_img_url($id)!!}
}
