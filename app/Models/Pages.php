<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable =[
        'title',
        'description',
        'keywords',
        'template_id',
        'updated_at',
    ];
}
