<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/json/cities.json');
        $cities = json_decode($json_file);
        foreach ($cities as $city) {
        	City::create([
        		'id' => $city->city_id,
        		'name' => $city->city_name,
        		'province_id' => $city->province_id,
        		'type' => $city->type,
        		'postal_code' => $city->postal_code
        	]);
        }
    }
}
