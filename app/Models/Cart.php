<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table = 'carts';

    public $fillable = [
        'product_id', 'user_id', 'name','price','quantity','images','total', 'created_at','updated_at'
    ];
}

