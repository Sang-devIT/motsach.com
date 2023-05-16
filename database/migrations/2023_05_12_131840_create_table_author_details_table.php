<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAuthorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_author_details', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('authour_id');
            $table->foreign('authour_id')->references('id')->on('table_author');
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('table_product');
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
        Schema::dropIfExists('table_author_details');
    }
}
