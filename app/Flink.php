<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flink extends Model
{
    protected $table='flink';
    protected $fillable=['url','name','image','type','user_id','goods_id','created_at'];
}
