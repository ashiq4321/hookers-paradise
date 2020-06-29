<?php

use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'id'=>1,
            'name' => 'Sunday'
            ]);
        DB::table('days')->insert([
            'id'=>2,
            'name' => 'Monday'
            ]);
        DB::table('days')->insert([
            'id'=>3,
            'name' => 'Tuesday'
            ]);
        DB::table('days')->insert([
            'id'=>4,
            'name' => 'Wednesday'
            ]); 
        DB::table('days')->insert([
            'id'=>5,
            'name' => 'Thursday'
            ]);
        DB::table('days')->insert([
            'id'=>6,
            'name' => 'Friday'
            ]);
        DB::table('days')->insert([
            'id'=>7,
            'name' => 'Saturday'
            ]);
        DB::table('days')->insert([
            'id'=>8,
            'name' => 'Holyday'
            ]); 
                  
    }
}
