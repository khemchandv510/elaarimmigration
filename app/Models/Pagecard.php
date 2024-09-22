<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagecard extends Model
{
     use HasFactory;

    protected $table = 'page_card';

    protected $fillable = [
        'id',
        'product_id',
        'keyword',
        'url',
      
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    

}
