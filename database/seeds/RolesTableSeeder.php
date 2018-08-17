<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        	[
        		'id' => 1,
        		'name' => 'Administrator',
        	],
        	[
        		'id' => 2,
        		'name' => 'Operator',
        	],
        	[
        		'id' => 3,
        		'name' => 'Buyer',
        	],
        ]);
    }
}
