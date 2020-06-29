<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([LanguageSeeder:: class,
                AddressSeeder:: class,
                UserSeeder::class,
                BodyHairSeeder:: class,
                BraSizeSeeder:: class,
                ColorSeeder:: class,
                PubicHairSeeder:: class,
                HairLengthSeeder:: class,
                LocationSeeder::class,
                SedCardSeeder::class,
                TimeSeeder::class,
                DaySeeder::class,
                SedcardLanguageSeeder::class
         ]);
    }
}
