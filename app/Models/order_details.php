<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    protected $table = 'order_detail';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantily',
        'price',
    ];
    use HasFactory;
}
