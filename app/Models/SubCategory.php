<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'category_id', 'navi', 'image', 'position' ];

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subSubCategories()
    {
        return $this->hasMany(SubSubCategory::class);
    }
}
