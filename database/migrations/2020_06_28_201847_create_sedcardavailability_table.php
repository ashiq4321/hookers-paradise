<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedcardavailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedcardavailability', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sedcard_id');
            $table->foreign('sedcard_id')->references('id')->on('sedcards');

            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')->references('id')->on('days');

            $table->unsignedBigInteger('from_id');
            $table->foreign('from_id')->references('id')->on('times');

            $table->unsignedBigInteger('to_id');
            $table->foreign('to_id')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sedcardavailability');
    }
}
