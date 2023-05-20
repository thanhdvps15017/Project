<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NewsComment;
use Auth;
use Carbon\Carbon;

class NewsCommentComponent extends Component
{
    public $message = "";
    public $news_id;

    public function storeComment(){
        $this->validate([
            'message' => 'required | max: 999'
        ],[
            'message.required' => 'Không thể bình luận trống không',
            'message.max' => 'Tối đa 1000 kí tự',
        ]);
        $newsComment = NewsComment::create([
            'news_id' => $this->news_id,
            'user_id' => Auth::id() ?? 1,
            'message' => $this->message,
        ]);
        $this->message = "";
        session()->flash('message','Bình luận thành công');
    }
    public function render()
    {
        $newsComments = NewsComment::where('news_id',$this->news_id)->where('appear', 1)->oldest()->get();
        return view('livewire.news-comment-component', ['newsComments' => $newsComments]);
    }
}
