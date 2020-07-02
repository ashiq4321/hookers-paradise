<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $adminRole = Role::where('name', 'admin')->first();

        User::create([
            'name' => 'seb',
            'email' =>'seb021290@gmail.com',
            'dateofBirth' => '2000-01-01',
            'password' => Hash::make('test1234'),
            'phoneNumber' => '01452065402',
            'address_id' => 1,
            'language_id' => 1
        ])->roles()->attach($adminRole);

        User::create([
            'name' => 'maria',
            'email' =>'maria@gmail.com',
            'dateofBirth' => '2000-01-01',
            'password' => Hash::make('maria1234'),
            'phoneNumber' => '01452065402',
            'address_id' => 1,
            'language_id' => 1
        ]);
        User::create([
            'name' => 'Juli',
            'email' =>'juli@gmail.com',
            'dateofBirth' => '2000-01-01',
            'password' => Hash::make('juli1234'),
            'phoneNumber' => '01452065402',
            'address_id' => 2,
            'language_id' => 2
        ]);
        User::create([
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
