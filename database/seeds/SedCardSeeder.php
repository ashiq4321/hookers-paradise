<?php

use Illuminate\Database\Seeder;

class SedCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sedcards')->insert([
            'id'=>1,
            'user_id' => '1',
            'address_id' => '1',
            'location_id' => '1',						
            'eyeColor_id' => '1',
            'hairlengths_id' => '1',
            'pubicHair_id' => '1',
            'bodyHairs_id' => '1',
            'skinColor_id' => '1',
            'hairColor_id' => '1',
            'braSize_id' => '1',
            'name' => 'hazel',
            'title' => 'attractive girl',
            'dateOfBirth' => '2000-01-01',
            'weight' => '65',
            'tall' => '5.2',
            'phoneNumber' => '+03155662200',
            'tattoCount' => '2',
            'peircingsCount' => '2',
            'hasInTimePiercing' => 'no',
            'isSomking' => 'yes',
            'isDrinking' => 'yes',
            'isDevote' => 'no',
            'isDominant' => 'no',
            'priceDescription' => '$50 per hour',
            'availabilityDescription' => 'from 8pm - 6am',
            'phoneDescription' =>'+03155662200 is available only service time',
            'description' => 'this is hazel sedcard',
            'isActive' => 'yes',
            'isVerified' => 'yes',
            'isPhoneVerified' => 'yes',
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        ]);
    }
}
