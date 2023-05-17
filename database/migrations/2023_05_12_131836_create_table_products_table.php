<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category');
            $table->foreign('id_category')->references('id')->on('table_category');
            $table->integer('id_produce');
            $table->foreign('id_produce')->references('id')->on('table_produce');
            $table->string('photo');
            $table->string('name');
            $table->integer('regular_price');
            $table->integer('sale_price');
            $table->integer('discount');
            $table->string('code');
            $table->integer('stt');
            $table->mediumText('desc');
            $table->longText('content');
            $table->integer('stock');
            $table->string('status');
            $table->string('slug');
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
        Schema::dropIfExists('table_products');
    }
}
