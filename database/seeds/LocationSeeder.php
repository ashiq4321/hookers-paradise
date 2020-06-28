<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id	name	title	phoneNumber	description	created_at	updated_at	deleted_at	address_id
        DB::table('locations')->insert([
            'id'=>1,
            'name' => 'AngleHouse',
            'title' =>'peace house',
            'phoneNumber' => '+03155662200',
            'description' => 'Location 01',
            'created_at' => null,
            'updated_at' => null,
            'created_at' => null,
            'address_id' => '1'
        ]);
    }
}
