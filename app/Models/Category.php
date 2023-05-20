<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];

    public $fillable = [
        'name', 'slug', 'appear','description','keywords','sort', 'created_at','updated_at', 'image'
    ];
}
