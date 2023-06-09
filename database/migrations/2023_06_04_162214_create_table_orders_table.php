<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('table_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('table_users')->onDelete('cascade');
            $table->dateTime('order_date');
            $table->integer('total_money');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('order_payment')->nullable();
            $table->string('requirements')->nullable();
            $table->string('status');
            $table->string('order_code');
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
        Schema::dropIfExists('table_orders');
    }
}
