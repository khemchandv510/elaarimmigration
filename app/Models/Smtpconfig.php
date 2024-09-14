<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smtpconfig extends Model
{
    use HasFactory;
    protected $table = 'smtpconfig';


    protected $fillable = [
        'id',
        'host',
       	'SMTPAuth',
        'Username', 
        'Password',
        'SMTPSecure'	

    ];


}
