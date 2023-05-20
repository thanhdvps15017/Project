<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'products';

    public $fillable = [
        'name',
        'brand_id',
        'pr_category_id',
        'slug',
        'images',
        'view',
        'bought',
        'description',
        'contents',
        'price',
        'price_pay',
        'discount',
        'sku',
        'sex',
        'appear',
        'created_at',
        'updated_at',
        'keywords',
        'quantity'
    ];
    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }
}