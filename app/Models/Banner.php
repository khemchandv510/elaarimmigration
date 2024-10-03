<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'page_id',
       	'destop',
        'mobile', 
        'title',
        'page_id',
        'created_at',
        'updated_at',
        'Description',
        'url'	

    ];


}
