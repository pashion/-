<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //商品订单详情表
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');


            $table->char('order_guid');//订单编号
            $table->integer('user_id');//商品id
            $table->integer('goods_id');//商品id
            $table->tinyInteger('order_status');//订单状态1,待收货;2,待发货;3,待收货;4,待评价;5,完成;6,取消
            $table->integer('commodity_number');//商品数量
            $table->string('cargo_price');//商品单价
            $table->tinyInteger('ruturn_status');//退货状态1不退货;2,退货;
            $table->tinyInteger('comment_status');//评论状态1,未评论;2,已评论
            $table->timestamp('addtime');//添加时间
            $table->tinyInteger('delete_at');//自定义软删除1,正常;2,删除




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_detail');
    }
}
