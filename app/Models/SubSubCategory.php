<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    protected $fillable = ['name', 'category_id', 'navi', 'image', 'sub_category_id', 'position'];

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
