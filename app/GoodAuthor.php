<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodAuthor extends Model
{
    protected $fillable=[
        'goodid' , 'authorid' ,
    ];
    public $timestamps = false;
}
