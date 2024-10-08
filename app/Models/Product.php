<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'category_id', 
            'sub_category_id', 
            'child_category_id', 
            'metaTag', 
            'meta_desc', 
            'meta_tag_key', 
            'seo_url', 
            'dynamic_head',
            'dynamic_body',
            'footer_desc', 
            'faq_title',
            'keyword_title',
            'pageCardDescription',
            'PcardTitle',
            'topices',
            'navigation',
            'inquiry'
            
    ];


public function mainCategory()
{
    return $this->belongsTo(Category::class, 'category_id');
}


 public function SubCategories()
{
    return $this->belongsTo(SubCategory::class, 'sub_category_id');
}

public function subSubCategories()
{
    return $this->belongsTo(SubSubCategory::class,  'sub_sub_category');
}

}
