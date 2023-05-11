<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTickerPrecisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticker_precises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticker_id')->index();
            $table->foreign('ticker_id')
                ->references('id')
                ->on('tickers')
                ->nullOnDelete();

            $table->unsignedSmallInteger('price_precision')->index();
            $table->unsignedSmallInteger('quantity_precision')->index();
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
        Schema::dropIfExists('ticker_precises');
    }
}
