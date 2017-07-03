<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criticism extends Model
{
    protected $table='criticism';
    protected $fillable=['comment_type','star','comment_info','user_id','goods_id','created_at'];
}
