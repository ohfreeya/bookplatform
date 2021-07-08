<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $fillable = [
        'bookid', 'authorid',
    ];
    public $timestamps = false;
}
