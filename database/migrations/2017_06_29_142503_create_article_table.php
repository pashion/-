<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);//标题
            $table->string('description',255);//描述
            $table->nullableTimestamps('date');//事件
            $table->text('content');//内容
            $table->string('cover',255);//封面图名字
            $table->string('coverpath',255);//封面图路径
            $table->string('author',255);//作者
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
        Schema::drop('article');
    }
}
