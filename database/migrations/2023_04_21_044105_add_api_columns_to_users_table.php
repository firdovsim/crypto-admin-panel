<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApiColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('api_key_real')->nullable();
            $table->string('api_sec_real')->nullable();
            $table->boolean('is_working')->default(false);
            $table->time('start_time')->nullable();
            $table->time('finish_time')->nullable();
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
            $table->dropColumn('api_key_real');
            $table->dropColumn('api_sec_real');
            $table->dropColumn('is_working');
            $table->dropColumn('start_time');
            $table->dropColumn('finish_time');
        });
    }
}
