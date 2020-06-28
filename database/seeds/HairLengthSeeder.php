<?php

use Illuminate\Database\Seeder;

class HairLengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hairlengths')->insert([
            'id'=>1,
            'name' => '32'
            ]);
        DB::table('hairlengths')->insert([
            'id'=>2,
            'name' => '34'
            ]);
        DB::table('hairlengths')->insert([
            'id'=>3,
            'name' => '36'
            ]);
        DB::table('hairlengths')->insert([
            'id'=>4,
            'name' => '38'
            ]);
        DB::table('hairlengths')->insert([
            'id'=>5,
            'name' => '40'
            ]);
    }
}
