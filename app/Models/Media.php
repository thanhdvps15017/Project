<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable =[
        'name', 'url', 'alt', 'updated_at'
    ];
}
