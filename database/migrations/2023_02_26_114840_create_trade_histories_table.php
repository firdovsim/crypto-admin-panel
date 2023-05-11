<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticker_id')->index();
            $table->foreign('ticker_id')
                ->references('id')
                ->on('tickers')
                ->nullOnDelete();

            $table->string('trade_id');
            $table->string('order_id');
            $table->string('side');
            $table->double('quantity');
            $table->double('commission');
            $table->double('realized_pnl');
            $table->string('time');
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
        Schema::dropIfExists('trade_histories');
    }
}
