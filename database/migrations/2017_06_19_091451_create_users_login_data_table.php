<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLoginDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户登录信息
        Schema::create('users_login_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');//用户id
            $table->string('login_name');//登录账号
            $table->char('password');//登录密码
            $table->char('last_login_ip');//最后一次登录IP
            $table->timestamp('last_login_at');//最后一次登录时间
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
        Schema::drop('users_login_data');
    }
}
