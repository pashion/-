<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration
{
    /**
     * 室内设计方案
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dname');//设计者名称
            $table->string('dtitle');//设计者名称
            $table->string('dstyle');//设计风格
            $table->string('area');//设计区域
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
        Schema::drop('designs');
    }
}
