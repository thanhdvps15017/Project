<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable =[
        'user_id ',
        'category_id ',
        'image',
        'title',
        'summary',
        'content',
        'view',
        'hot',
        'appear',
        'updated_at',
        'slug',
        'keywords'
    ];
}
