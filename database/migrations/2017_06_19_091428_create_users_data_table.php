<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户信息表
        Schema::create('users_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');//用户id
            $table->string('avatar');//头像
            $table->string('username');//用户名称
            $table->string('name');//真实姓名
            $table->tinyInteger('sex');//性别
            $table->string('email');//邮箱
            $table->string('birthday');//生日


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
        Schema::drop('users_data');
    }
}
