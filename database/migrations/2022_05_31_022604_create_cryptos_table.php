<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticker_id')->index();
            $table->foreign('ticker_id')
                ->references('id')
                ->on('tickers')
                ->cascadeOnDelete();

            $table->double('minimum_rsi')->default(0);
            $table->double('maximum_rsi')->default(0);

            $table->double('take_profit')->default(0);

            $table->double('quantity')->default(0);
            $table->string('interval')->nullable();

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->unique(['ticker_id', 'user_id']);

            $table->boolean('status')->default(false);
            $table->double('stop_loss')->default(0);
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
        Schema::dropIfExists('cryptos');
    }
}
