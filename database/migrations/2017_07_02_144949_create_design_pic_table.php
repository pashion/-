<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignPicTable extends Migration
{
    /**
     * 设计方案图片表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_pic', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('did');//设计方案ID
            $table->string('picname');//图片名
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
        Schema::drop('design_pic');
    }
}
