<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->integer('transaction_id')->unsigned();
            $table->integer('pizza_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();
            
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('pizza_id')->references('id')->on('pizzas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
}
