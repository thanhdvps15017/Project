<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{   
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'status',
    ];
    use HasFactory;
}
