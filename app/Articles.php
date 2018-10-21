<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Articles extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Articles';
    
    protected $fillable = [
        'userid', 'title','text','like','dislike','comments'
    ];
}
