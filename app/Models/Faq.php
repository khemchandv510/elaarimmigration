<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'product_id',
        'page_id',
        'created_at',
        'updated_at',
    ];

    

    

}
