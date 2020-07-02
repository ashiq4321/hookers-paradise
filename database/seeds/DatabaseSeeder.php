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
                RolesTableSeeder::class,
                UserSeeder::class,
                BodyHairSeeder:: class,
                BraSizeSeeder:: class,
                ColorSeeder:: class,
                PubicHairSeeder:: class,
                HairLengthSeeder:: class,
                LocationSeeder::class,
                SedcardSeeder::class,
                TimeSeeder::class,
                DaySeeder::class,
                SedcardLanguageSeeder::class
         ]);
    }
}
