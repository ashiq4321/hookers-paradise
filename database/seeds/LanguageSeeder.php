<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'id'=>1,
            'name' => 'English'
            ]);
        DB::table('languages')->insert([
            'id'=>2,
            'name' => 'Arabic'
            ]);
        DB::table('languages')->insert([
            'id'=>3,
            'name' => 'hindi'
            ]);
    }
}
