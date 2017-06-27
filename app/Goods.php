<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $fillable = ['goods', 'price', 'stockall', 'style', 'area', 'kind', 'pic', 'desr', 'state'];
}
