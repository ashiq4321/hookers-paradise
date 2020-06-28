<?php

use Illuminate\Database\Seeder;

class BodyHairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodyhairs')->insert([
            'id'=>1,
            'name' => 'fresh'
            ]);
        DB::table('bodyhairs')->insert([
            'id'=>2,
            'name' => 'little'
            ]);
        DB::table('bodyhairs')->insert([
            'id'=>3,
            'name' => 'observable'
            ]);
    }
}
