<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable =[
        'coupon_code',
        'coupon_type',
        'description',
        'discount',
        'min_total',
        'max_discount',
        'date_start',
        'date_expire',
        'quantity',
        'remaining',
        'updated_at',
    ];
}
