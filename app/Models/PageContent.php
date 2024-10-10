<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;
    protected $table = 'page_contents';


    protected $fillable = [
        'id',
        'image',
       	'url',
        'description', 
        'product_id',
        'page_id',
        'created_at',
        'product_title',
        'news_id'

    ];


}
