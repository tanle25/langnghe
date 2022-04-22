<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('provider');
            $table->string('provider_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('status'); // 1: active, 2: deactive
            $table->integer('point');
            $table->string('phone')->unique()->nullable();
            $table->integer('huyen')->nullable();
            $table->integer('xa')->nullable();
            $table->string('xom')->nullable();
            $table->string('birthday')->nullable();
            $table->boolean('gender')->nullable(); // 1: nam, 2: nu
            $table->string('cmtnd')->nullable();
            $table->string('ngaycap')->nullable();
            $table->string('noicap')->nullable();
            $table->boolean('otp')->nullable();
            $table->string('image')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
