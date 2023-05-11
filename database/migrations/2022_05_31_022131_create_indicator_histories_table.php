<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('indicator_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indicator_id')->index();
            $table->foreign('indicator_id')
                ->references('id')
                ->on('indicators')
                ->cascadeOnDelete();

            $table->double('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicator_histories');
    }
};
