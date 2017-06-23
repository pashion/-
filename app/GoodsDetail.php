<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsDetail extends Model
{
    protected $table = 'goods_detail';
    protected $fillable = ['gid', 'content'];
}
