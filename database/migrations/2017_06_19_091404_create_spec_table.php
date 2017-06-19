<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //规格表
        Schema::create('spec', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//属性名称
            $table->integer('sid');//规格id
            $table->integer('hid');//规格头id
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
        Schema::drop('spec');
    }
}
