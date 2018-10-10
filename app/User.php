<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'User';
    
    protected $fillable = [
        'username', 'email','password','cover_image'=>'image|max:1999','friends','friend_requests_recv','friend_requests_sent'
    ];
}
