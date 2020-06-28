<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>1,
            'name' => 'maria',
            'email' =>'maria@gmail.com',
            'dateofBirth' => '2000-01-01',
            'password' => Hash::make('maria1234'),
            'phoneNumber' => '01452065402',
            'address_id' => 1,
            'language_id' => 1
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'name' => 'Juli',
            'email' =>'juli@gmail.com',
            'dateofBirth' => '2000-01-01',
            'password' => Hash::make('juli1234'),
            'phoneNumber' => '01452065402',
            'address_id' => 2,
            'language_id' => 2
        ]);
        DB::table('users')->insert([
            'id'=>3,
            'name' => 'Angle',
            'email' =>'angle@gmail.com',
            'dateofBirth' => '2000-01-01',
            'password' => Hash::make('angle1234'),
            'phoneNumber' => '01451111112',
            'address_id' => 3,
            'language_id' => 3
        ]);
    }
}
