<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type'); //1: mua, 2: ban, 3: tim doi tac
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('content');
            $table->integer('type_product_id');
            $table->integer('huyen');
            $table->integer('xa')->nullable();
            $table->string('end_date');
            $table->text('address');
            $table->text('phone');
            $table->text('images')->nullable();
            $table->integer('user_id');
            $table->integer('status');
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
        Schema::dropIfExists('threads');
    }
}
