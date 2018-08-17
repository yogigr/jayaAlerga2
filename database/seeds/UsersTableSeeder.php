<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	[
        		'id' => 1,
        		'first_name' => 'Wildan',
        		'last_name' => 'Waliguna',
        		'email' => 'wildanwaliguna@gmail.com',
        		'password' => bcrypt('secret'),
        		'role_id' => 1,
        		'address' => 'Blok A RT 03 RW 01 Desa Rajagaluhlor Kecamatan Rajagaluh',
        		'city_id' => 252,
        		'province_id' => 9,
        		'postal_code' => '45472',
        		'phone' => '089758968742'
        	],

        	[
        		'id' => 2,
        		'first_name' => 'Yogi',
        		'last_name' => 'Gilang Ramadhan',
        		'email' => 'yogigilang182@gmail.com',
        		'password' => bcrypt('secret'),
        		'role_id' => 2,
        		'address' => 'Blok A RT 03 RW 01 Desa Rajagaluhlor Kecamatan Rajagaluh',
        		'city_id' => 252,
        		'province_id' => 9,
        		'postal_code' => '45472',
        		'phone' => '089758968741'
        	],

        	[
        		'id' => 3,
        		'first_name' => 'Yudi',
        		'last_name' => 'Mashudi',
        		'email' => 'yudimashudi7@gmail.com',
        		'password' => bcrypt('secret'),
        		'role_id' => 3,
        		'address' => 'Blok A RT 03 RW 01 Desa Rajagaluhlor Kecamatan Rajagaluh',
        		'city_id' => 252,
        		'province_id' => 9,
        		'postal_code' => '45472',
        		'phone' => '089758968740'
        	]
        ]);
    }
}
