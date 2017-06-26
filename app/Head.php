<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    protected $table = 'head';
    protected $fillable = ['name', 'tid', 'must'];
}
