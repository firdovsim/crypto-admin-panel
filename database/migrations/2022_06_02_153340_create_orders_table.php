<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('ticker_id')->index();
            $table->foreign('ticker_id')
                ->references('id')
                ->on('tickers')
                ->cascadeOnDelete();
            $table->enum('status', ['FILLED', 'CANCELLED', 'NEW', 'REJECTED']);
            $table->string('client_order_id');
            $table->double('price')->default(0);
            $table->double('avg_price')->default(0);
            $table->double('orig_qty');
            $table->double('executed_qty')->default(0);
            $table->double('cum_quote')->default(0);

            $table->enum('type', ['MARKET', 'LIMIT']);
            $table->enum('side', ['BUY', 'SELL']);
            $table->enum('orig_type', ['MARKET', 'LIMIT']);

            $table->boolean('reduce_only')->default(false);
            $table->boolean('close_position')->default(false);
            $table->string('stop_price')->nullable()->default(0);
            $table->string('working_type')->default('CONTRACT');
            $table->boolean('price_protect')->default(false);
            $table->string('time');
            $table->string('update_time');
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
        Schema::dropIfExists('orders');
    }
}
