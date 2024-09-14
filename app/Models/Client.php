<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
     use HasFactory;
    use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'id',
        'title',
        'image',
        'category_id',
        'sub_category_id',
        'sub_sub_category',
        'video_link',
        'tag_desc',
        'content',
       
        'created_at',
        'updated_at',
        'deleted_at'
    ];

     public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    

    

}
