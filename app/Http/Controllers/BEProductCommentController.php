<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductComment;

class BEProductCommentController extends Controller
{
    public function index(){
        $title = 'Bình luận sản phẩm';
        $productComments = ProductComment::all();
        return view('admin.product.product_comment',compact('productComments','title'));
    }
    public function destroy(Request $request){
        $commentDelete = ProductComment::findOrFail($request->id);
        $commentDelete->delete();
        return response()->json(['success' => true]);
    }
    public function changeAppear(Request $request){
        $product_comment = ProductComment::findOrFail($request->id);
        $product_comment->appear = $request->appear;
        $product_comment->save();
        return response()->json(['success' => true]);
    }
}
