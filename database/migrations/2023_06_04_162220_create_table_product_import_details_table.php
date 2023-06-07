<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductImportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_product_import_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product');
            $table->foreign('id_product')->references('id')->on('table_product');
            $table->integer('id_product_import');
            $table->foreign('id_product_import')->references('id')->on('table_product_import');
            $table->integer('quantity');
            $table->float('price');
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
        Schema::dropIfExists('table_product_import_details');
    }
}
