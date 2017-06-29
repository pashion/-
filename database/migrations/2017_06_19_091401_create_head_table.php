<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //选项头表
        Schema::create('head', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//选项名
            $table->tinyInteger('tid');//类别id
            $table->tinyInteger('must');//是否必须填写
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
        Schema::drop('head');
    }
}
