<?php

use Illuminate\Database\Seeder;

class BraSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brasizes')->insert([
            'id'=>1,
            'name' => '32'
            ]);
        DB::table('brasizes')->insert([
            'id'=>2,
            'name' => '34'
            ]);
        DB::table('brasizes')->insert([
            'id'=>3,
            'name' => '36'
            ]);
        DB::table('brasizes')->insert([
            'id'=>4,
            'name' => '38'
            ]);
        DB::table('brasizes')->insert([
            'id'=>5,
            'name' => '40'
            ]);
    }
}
