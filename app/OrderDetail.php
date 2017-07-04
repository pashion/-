<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='orderDetail';
    protected $fillable=['goods_id','goods_name','cargo_price','commodity_number','ruturn_status','comment_status','order_status','order_id','goods_pic'];
}
