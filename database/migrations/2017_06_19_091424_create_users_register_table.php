<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户注册表
        Schema::create('users_register', function (Blueprint $table) {
            $table->increments('id');

            $table->string('username');//用户名称
            $table->string('password');//密码
            $table->string('email')->unique();//手机号码
            $table->tinyInteger('status');//手机号码
            $table->string('token');//手机号码
            $table->char('third_party_id');//第三方ID
            $table->string('register_ip');//注册IP

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
        Schema::drop('users_register');
    }
}
