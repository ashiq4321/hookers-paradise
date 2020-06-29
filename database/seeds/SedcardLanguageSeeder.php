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
        DB::table('sedcardlanguages')->insert([
            'language_id'=>1,
            'sedcard_id' => 1
            ]);
    }
}
