<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'link',
       	'product_id',
        'page_id',
        'status', 
        'name',
        'updated_at'	

    ];


}
