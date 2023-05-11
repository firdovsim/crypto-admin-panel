<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('max_open_orders')->default(5);
            $table->unsignedSmallInteger('interval_between_orders')->default(90);
            $table->unsignedSmallInteger('max_orders_in_interval')->default(2);

            $table->string('telegram_token')->nullable();
            $table->text('telegram_template')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
