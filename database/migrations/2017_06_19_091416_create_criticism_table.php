<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriticismTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //商品评论表
        Schema::create('criticism', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('goods_id');//商品id
            $table->integer('order_id');//订单id
            $table->integer('user_id');//用户id
            $table->tinyInteger('comment_type');//匿名评价0,匿名评价1,显示用户名;
            $table->tinyInteger('star');//1,好评;2,中评;3,差评
            $table->text('comment_info');//评论内容

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
        Schema::drop('criticism');
    }
}
