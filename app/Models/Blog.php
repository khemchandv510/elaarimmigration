<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = [
        'id',
        'blog_id',
        'title',
        'category_id',
        'sub_category_id',
        'sub_sub_category',
        'image',
        'auther_name',
        'slug',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
        'metatag',
        'metadescription',
        'metakeywords',
        'seourl',
        'scripthead',
        'scriptBody'
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
