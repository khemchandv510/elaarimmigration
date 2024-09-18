<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    use HasFactory;
    protected $table = 'socialmedia';
    protected $fillable = [
        'id',
        'facebook',
        'twitter',
        'linkdin',
        'user_id',
        'youtube',
        'pinterest'
    ];


}
