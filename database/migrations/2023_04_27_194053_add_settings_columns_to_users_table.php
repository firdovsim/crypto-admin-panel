<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedSmallInteger('max_open_orders')->default(5);
            $table->unsignedSmallInteger('interval_between_orders')->default(90);
            $table->unsignedSmallInteger('max_orders_in_interval')->default(2);

            $table->boolean('status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('max_open_orders');
            $table->dropColumn('interval_between_orders');
            $table->dropColumn('max_orders_in_interval');
        });
    }
}
