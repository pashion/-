<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexModeTable extends Migration
{
    /**
     * 前台商品模板控制表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_mode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');//文件名
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
        Schema::drop('index_mode');
    }
}
