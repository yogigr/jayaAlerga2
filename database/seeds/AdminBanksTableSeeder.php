<?php

use Illuminate\Database\Seeder;
use App\AdminBank;

class AdminBanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminBank::insert([
        	[
        		'bank_name' => 'BRI',
        		'bank_account' => '32100567849',
        		'under_the_name' => 'JAYA ALERGA',
        		'logo' => 'bri.png',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'bank_name' => 'BCA',
                'bank_account' => '32100567848',
                'under_the_name' => 'JAYA ALERGA',
                'logo' => 'bca.png',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'bank_name' => 'MANDIRI',
                'bank_account' => '32100567847',
                'under_the_name' => 'JAYA ALERGA',
                'logo' => 'mandiri.png',
        		'created_at' => now(),
        		'updated_at' => now()
        	]
        ]);
    }
}
