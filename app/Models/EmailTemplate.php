<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'template_name',
       	'subject',
        'content', 
        'dynamic_name',
        'dynamic_other',
        'created_at',
        'updated_at'	

    ];


}
