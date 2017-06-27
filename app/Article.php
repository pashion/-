<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'Article';
    protected $fillable = ['id','title','date','content','desc','cover'];
}
