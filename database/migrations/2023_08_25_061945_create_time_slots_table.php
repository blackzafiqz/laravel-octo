<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TimeSlot', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time_start');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('theater_id');
            $table->unsignedBigInteger('room');
            $table->foreign('movie_id')->references('id')->on('Movie');
            $table->foreign('theater_id')->references('id')->on('Theater');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_slots');
    }
};
