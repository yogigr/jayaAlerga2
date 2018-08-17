<?php

use Illuminate\Database\Seeder;
use App\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/json/provinces.json');
        $provinces = json_decode($json_file);
        foreach ($provinces as $province) {
        	Province::create([
        		'id' => $province->province_id,
        		'name' => $province->province
        	]);
        }
    }
}
