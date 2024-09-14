<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'group_id',
        'unsubscribe',
        'status',
        'date',
        'send_date',
        'created_at',
        'updated_at'
    ];

    

    

}
