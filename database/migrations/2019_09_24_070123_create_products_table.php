<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('product_code')->unique();
            $table->string('slug')->unique();
            $table->integer('price')->default(0);
            $table->integer('amount')->default(0);
            $table->integer('sale_off')->default(0);
            $table->integer('type_product_id');
            $table->integer('type_product_id_2')->nullable();
            $table->integer('shop_id');
            $table->string('unit')->nullable();
            $table->integer('status');
            $table->text('des')->nullable();
            $table->text('images')->nullable();
            $table->string('ma_vach')->nullable();
            $table->string('ma_truy_xuat')->nullable();
            $table->string('dong_goi')->nullable();
            $table->string('bao_quan')->nullable();
            $table->integer('created_by');
            $table->string('san_luong')->nullable();
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
        Schema::dropIfExists('products');
    }
}
