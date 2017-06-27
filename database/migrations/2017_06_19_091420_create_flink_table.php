<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //友情链接
        Schema::create('flink', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//名称
            $table->tinyInteger('type');//链接类型1,显示;2,不显示;
            $table->string('url');//链接地址
            $table->string('image');//图片
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
        Schema::drop('flink');
    }
}
