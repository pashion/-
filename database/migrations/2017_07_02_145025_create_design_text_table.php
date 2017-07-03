<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignTextTable extends Migration
{
    /**
     * 设计方案内容
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_text', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('did');//设计方案id
            $table->text('text');//设计方案内容
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
        Schema::drop('design_text');
    }
}
