<?php

use Illuminate\Database\Seeder;

class SedcardLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sedcardlanguages')->insert([
            'language_id'=>1,
            'Sedcard_id' => 1
            ]);
    }
}
