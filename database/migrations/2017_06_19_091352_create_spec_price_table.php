<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //规格价格表
        Schema::create('spec_price', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store');   //库存量
            $table->integer('gid');     //商品id
            $table->string('str_bunch');//属性串
            $table->string('num_bunch');//属性串名
            $table->double('price', 15, 8);//价格
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
        Schema::drop('spec_price');
    }
}
