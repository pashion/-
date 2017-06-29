<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wheel extends Model
{
    protected $table = 'wheel';
    protected $fillable = ['picname','picurl','sort',path];
}
