<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
//
	DB::table('states')->delete();
	$states = array(
        array('name' => "Sindh",'country_id' => 1),
		array('name' => "Balochistan",'country_id' => 1),
		array('name' => "Gilgit–baltistan",'country_id' => 1),
		array('name' => "Khyber Pakhtunkhwa",'country_id' => 1),
		array('name' => "Punjab",'country_id' => 1),
		);
		DB::table('states')->insert($states);
}
}
