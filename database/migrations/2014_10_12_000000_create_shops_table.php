<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('user_id');
            $table->string('created_by');
            $table->string('password');
            $table->boolean('status'); // 0: cho duyet, 1: active, 2: deactive
            $table->string('tencs');
            $table->integer('loaidn');
            $table->integer('huyen');
            $table->integer('xa');
            $table->string('xom');
            $table->text('mieuta')->nullable();
            $table->string('dt');
            $table->integer('nganhql');
            $table->integer('loaigiayto');
            $table->string('sogiay');
            $table->string('coquancp');
            $table->string('ngaycap');
            $table->string('image');
            $table->string('nguoidaidien');
            $table->integer('quymo');
            $table->integer('point')->default(0);
            $table->string('website')->nullable();
            $table->string('fanpage')->nullable();
            $table->text('map')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('shops');
    }
}
