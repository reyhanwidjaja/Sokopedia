<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetailTransactions', function (Blueprint $table) {
            $table->integer('transaction_id')->unsigned();
            $table->foreign('transaction_id')->references('id')->on('HeaderTransactions');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('Products');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactionDetails');
    }
}
