<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondType extends Model
{
    protected $fillable = ['name','tid','path','sort'];
    protected $table = 'second_type';
}
