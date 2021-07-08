<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = [
        'ISBN' , 'name' , 'edition' ,
        'language' , 'bookStatus' , 
        'price' , 'isDelete' ,
    ];
}
