<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //订单管理表
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');//用户id
            $table->integer('address_id');//地址id
            $table->tinyInteger('pay_type');//1,支付宝;2,微信;3,其他
            $table->tinyInteger('pay_status');//1,待支付;2,已支付;3,取消支付
            $table->double('tatal_amount', 15, 8);//商品总金额



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
        Schema::drop('order');
    }
}
