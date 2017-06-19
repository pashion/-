<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户地址表
        Schema::create('users_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('get_name',32);//用户名称
            $table->string('phone',32);//收货人手机号码
            $table->string('province',32);//省份
            $table->string('city',32);//城市
            $table->string('county',32);//县/区
            $table->string('detaile_address',255);//详细地址
            $table->char('code',16);//邮编
            $table->tinyInteger('status');//地址状态
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
        Schema::drop('users_address');
    }
}
