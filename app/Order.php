<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';
    protected $fillable=['user_id','address_id','pay_type','pay_status','tatal_amount','created_at','cupdated_at'];
}
