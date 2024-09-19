<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
            'page_name',
            'type',
            'banner1', 
            'banner2', 
            'banner_title', 
            'banner_url', 
            'description',
            'meta_tag',
            'meta_desc', 
            'meta_keywords', 
            'seo_url', 
            'head_tag',
            'body_tag',
            'footer_desc', 
            'created_at',
            'keyword_title'
    ];
}
