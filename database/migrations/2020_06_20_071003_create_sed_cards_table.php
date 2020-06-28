<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedcards', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');
           
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');
            
            $table->unsignedBigInteger('eyeColor_id')->nullable();
            $table->foreign('eyeColor_id')->references('id')->on('colors');

            $table->unsignedBigInteger('pubicHair_id')->nullable();
            $table->foreign('pubicHair_id')->references('id')->on('pubichairs');
           
            $table->unsignedBigInteger('hairlengths_id')->nullable();
            $table->foreign('hairlengths_id')->references('id')->on('hairlengths');
           
            $table->unsignedBigInteger('bodyHairs_id')->nullable();
            $table->foreign('bodyHairs_id')->references('id')->on('bodyhairs');
            
            $table->unsignedBigInteger('skinColor_id')->nullable();
            $table->foreign('skinColor_id')->references('id')->on('colors');

            $table->unsignedBigInteger('hairColor_id')->nullable();
            $table->foreign('hairColor_id')->references('id')->on('colors');

            $table->unsignedBigInteger('braSize_id')->nullable();
            $table->foreign('braSize_id')->references('id')->on('brasizes');

            $table->string('name');
            $table->string('title');
            $table->string('dateOfBirth');
            $table->string('weight');
            $table->string('tall');
            $table->string('phoneNumber');
            $table->string('tattoCount');
            $table->string('peircingsCount');
            $table->string('hasInTimePiercing');
            $table->string('isSomking');
            $table->string('isDrinking');
            $table->string('isDevote');
            $table->string('isDominant');
            $table->mediumText('priceDescription');
            $table->mediumText('availabilityDescription');
            $table->mediumText('phoneDescription');
            $table->mediumText('description');
            $table->string('isVerified');
            $table->string('isPhoneVerified');
            $table->string('isActive');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sedCards');
    }
}
