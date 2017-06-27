<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected  $table = 'spec';
    protected $fillable = ['name', 'gid', 'hid'];
}
