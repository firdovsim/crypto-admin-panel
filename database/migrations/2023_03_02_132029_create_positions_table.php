<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('initial_margin');
            $table->string('maint_margin');
            $table->double('unrealized_profit');
            $table->double('position_initial_margin');
            $table->string('open_order_initial_margin');
            $table->string('leverage');
            $table->boolean('isolated')->default(false);
            $table->double('entry_price');
            $table->double('max_notional');
            $table->string('position_side');
            $table->double('position_amt');
            $table->string('notional');
            $table->string('isolated_wallet');
            $table->string('update_time');
            $table->string('bid_notional');
            $table->string('ask_notional');
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
        Schema::dropIfExists('positions');
    }
}
