<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'Article';
    protected $fillable = ['id','title','desc','date','content','cover','author','coverpath','oldimg'];
}
