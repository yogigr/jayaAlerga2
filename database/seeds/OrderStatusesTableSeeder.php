<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::insert([
        	[
        		'id' => 1,
        		'name' => 'Pending Payment',
        		'description' => 'Pembayaran tertunda atau Pembeli belum melakukan pembayaran',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 2,
        		'name' => 'In Progress',
        		'description' => 'Pesanan dalam proses',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 3,
        		'name' => 'On The Way',
        		'description' => 'Pesanan telah dikirim',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 4,
        		'name' => 'Delivered',
        		'description' => 'Pesanan sudah sampai ke tangan pembeli',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        ]);
    }
}
