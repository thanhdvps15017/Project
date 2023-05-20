<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pageMeta extends Model
{
    use HasFactory;
    protected $table = 'page_meta';
    protected $primaryKey = 'id';
    protected $dates = ['created_at'];
    protected $fillable =[
        'meta_key',
        'meta_label',
        'meta_type',
        'meta_value',
        'updated_at',
    ];
}
