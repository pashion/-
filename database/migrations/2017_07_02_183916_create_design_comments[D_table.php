<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignComments[DTable extends Migration
{
    /**
     * 设计方案评论
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid'); //用户id
            $table->string('tempuser');//临时用户名
            $table->text('content');//评论内容
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
        Schema::drop('design_comments');
    }
}
