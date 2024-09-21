<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;
    protected $table = 'company';

    protected $fillable = [

        'logo',
        'name',
        'email',
        'mobile',
        'country',
        'address1',
        'address2',
        'address2',
        'address4',
        'created_at',
        'updated_at',
        'deleted_at',
        'copyright',
         'headtag'
    ];


    

}
