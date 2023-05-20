<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    use HasFactory;
    protected $table = 'news_categories';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable =[
        'name',
        'slug',
        'sort',
        'description',
        'keywords',
        'image',
        'appear',
        'updated_at'
    ];
}
