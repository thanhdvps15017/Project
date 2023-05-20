<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'email';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable =[
        'name',
        'phone',
        'email',
        'message',
        'updated_at'
    ];
}
