<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id',
        'brand_id',
        'product_category_id',
        'name',
        'slug',
        'images',
        'view',
        'bought',
        'description',
        'content',
        'price',
        'discount',
        'sku',
        'sex',
        'appear',
        'keywords',
    ];

    use HasFactory;
}
