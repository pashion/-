<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //属性选项表
        Schema::create('option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//属性名称
            $table->integer('oid');//选项id
            $table->integer('hid');//选项头id
            $table->string('picurl');//图片路径
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
        Schema::drop('option');
    }
}
