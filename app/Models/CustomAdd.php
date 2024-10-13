<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomAdd extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'image',
       	'add_name',
        'add_url', 
        'product_id',
        'page_id',
        'created_at',
        'updated_at',
        'page_id',
        'news_id',
        'blog_id'	

    ];


}
