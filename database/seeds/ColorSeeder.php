<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('colors')->insert([
            'id'=>1,
            'name' => 'red'
            ]);
        DB::table('colors')->insert([
            'id'=>2,
            'name' => 'green'
            ]);
        DB::table('colors')->insert([
            'id'=>3,
            'name' => 'blue'
            ]);
        DB::table('colors')->insert([
            'id'=>4,
            'name' => 'white'
            ]);
    }
}
