<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupSedCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupSedCard', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('sedcard_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('sedcard_id')->references('id')->on('sedcards');
            $table->primary(array('group_id','sedcard_id'));
            $table->string('isAccepted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupSedCard');
    }
}
