<?php

use Illuminate\Database\Seeder;

class PubicHairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pubichairs')->insert([
            'id'=>1,
            'name' => 'fresh'
            ]);
        DB::table('pubichairs')->insert([
            'id'=>2,
            'name' => 'little'
            ]);
        DB::table('pubichairs')->insert([
            'id'=>3,
            'name' => 'observable'
            ]);
    }
}
