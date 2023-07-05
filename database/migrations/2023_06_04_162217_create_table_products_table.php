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
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('table_categories');
            $table->integer('id_produce')->unsigned();
            $table->foreign('id_produce')->references('id')->on('table_produces');
            $table->integer('id_author')->unsigned();
            $table->foreign('id_author')->references('id')->on('table_authors');
            $table->string('photo');
            $table->string('name');
            $table->integer('regular_price');
            $table->string('code');
            $table->mediumText('desc')->nullable();
            $table->longText('content')->nullable();
            $table->integer('stock')->nullable()->default(0);
            $table->string('status');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
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
