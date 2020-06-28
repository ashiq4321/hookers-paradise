<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'id'=>1,
            'city' => 'bezban',
            'postCode' => '4020',
            'country' => "astria",
            'street' => '40',
            'house' => '20',
            'description' => "this is description of address 1"    						
            ]);   
            DB::table('addresses')->insert([
                'id'=>2,
                'city' => 'rome',
                'postCode' => '5020',
                'country' => "romania",
                'street' => '30',
                'house' => '50',
                'description' => "this is description of address 2"    						
                ]);         
            DB::table('addresses')->insert([
                'id'=>3,
                'city' => 'isatambul',
                'postCode' => '1234',
                'country' => "afganistan",
                'street' => '12',
                'house' => '34',
                'description' => "this is description of address 3"    						
                ]); 
    }
}
