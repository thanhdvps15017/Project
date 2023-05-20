<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    use HasFactory;
    protected $table = 'news_comments';
    protected $fillable = ['news_id','user_id','message','appear'];

    public function news(){
        return $this->belongsTo(News::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
