<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_name',32);//管理员名称
            $table->string('power',32);//权限分配
            $table->string('really_name',32);//真实姓名
            $table->string('email',255);//邮箱
            $table->string('avatar',255);//头像
            $table->string('password',32);//密码
            $table->tinyInteger('status');//状态
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
        Schema::drop('users_admin');
    }
}
