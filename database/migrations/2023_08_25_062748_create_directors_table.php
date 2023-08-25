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
        Schema::create('Director', function (Blueprint $table) {
            $table->unsignedBigInteger('personnel_id');
            $table->unsignedBigInteger('movie_id');
            $table->primary(['personnel_id','movie_id']);
            $table->foreign('personnel_id')->references('id')->on('Personnel');
            $table->foreign('movie_id')->references('id')->on('Movie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directors');
    }
};
