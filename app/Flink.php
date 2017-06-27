<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flink extends Model
{
    protected $table='flink';
    protected $fillable=['url','name','image','type'];
}
