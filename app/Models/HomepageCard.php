<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomepageCard extends Model
{
     use HasFactory;
    use SoftDeletes;

    protected $table = 'homepage_card';

    protected $fillable = [
        'id',
        'content',
        'category_id',
        'add_link',
        'first_title',
        'second_title',
        'custom_name1',
        'url1',
        'custom_name2',
        'url2',
        'custom_name3',
        'url3',
        'custom_name4',
        'url4',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

     public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    

    

}
