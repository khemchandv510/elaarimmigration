<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
     use HasFactory;
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'id',
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
        'metatag', 'metadescription' ,  'metakeywords', 'seourl' , 'scripthead'  , 'scriptBody', 'publish_date'
    ];

     public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subSubCategories()
    {
        return $this->hasMany(SubSubCategory::class);
    }

    public function authorname(){
        return $this->belongsTo(Author::class, 'auther_name',  'name');
    }

    

    

}
