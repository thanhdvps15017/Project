<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductComment;
use Auth;
use Carbon\Carbon;
//use MongoDB\Driver\Session;
use Illuminate\Support\Facades\Session;

class ProductCommentComponent extends Component
{
    public $message = "";

    public function storeComment(){
        dd(Session::get('product_comment_id'));
        $this->validate([
            'message' => 'required | max: 999'
        ],[
            'message.required' => 'Không thể bình luận trống không',
            'message.max' => 'Tối đa 1000 kí tự',
        ]);
        $newsComment = ProductComment::create([
            'product_id' => Session::get('product_comment_id'),
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);
        dd($newsComment);
        $this->message = "";
        session()->flash('message','Bình luận thành công');
    }
    public function render()
    {
        $productComments = ProductComment::where('product_id', Session::get('product_comment_id'))->where('appear', 1)->oldest()->get();
        return view('livewire.product-comment-component',['productComments' => $productComments]);
    }
}
