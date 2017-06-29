<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string("goods");  //商品名
            $table->integer("price");  //商品基础价格
            $table->integer("stockall");  //商品基础价格
            $table->string("style");    //风格
            $table->string("area");     //区域
            $table->string("kind");     //种类
            $table->string("pic");      //图片
            $table->string("desr");     //描述
            $table->integer("state");      //状态
            $table->integer("clicknum");    //点击次数
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
        Schema::drop('goods');
    }
}
