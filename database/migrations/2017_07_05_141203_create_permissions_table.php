<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('p_name');//这个是权限相关菜单名
            $table->string('show_name');//权限名，拼接起来存储
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('permissions');
    }
    
}
