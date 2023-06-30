<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_orders_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orders');
            $table->foreign('id_orders')->references('id')->on('table_order');
            $table->integer('id_product');
            $table->foreign('id_product')->references('id')->on('table_product');
            $table->integer('price');
            $table->integer('total_money');
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_orders_details');
    }
}
