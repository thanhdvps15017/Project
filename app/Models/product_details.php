<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_details extends Model
{
    use HasFactory;
    public $table = 'product_details';

    public $fillable = [
    'product_id','color','size', 'quantity','created_at','updated_at'
    ];
}
