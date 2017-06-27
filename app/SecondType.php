<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondType extends Model
{
    public $table = 'second_type';
    protected $fillable = ['name','tid','path','sort'];

}
