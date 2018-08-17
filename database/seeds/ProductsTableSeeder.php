<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
        	[
        		'id' => 1,
        		'name' => 'Sepatu Kerja Pantofel Kantor Formal Pria Kulit Murah Berkualitas JT100',
        		'description' => "Sepatu ini diproduksi dengan sangat teliti dan presisi dari semua sisi dengan perhitungan yang sangat akurat yaitu hitungan milimeter dan kemiringan yang diperhitungkan setiap derajatnya. Dengan memeperhatikan bentuk anatomi kaki manusia produk ini diproduksi sehingga tidak bertentangan dengan prinsip-prinsip ortopedi.",
        		'slug' => 'sepatu-kerja-pantofel-kantor-formal-pria-kulit-murah-berkualitas-jt100',
        		'weight' => 800,
        		'price' => 189000,
        		'category_id' => 2,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 2,
        		'name' => 'Sepatu Boots Hummer Apollo',
        		'description' => "Material : Premium Leather
								Sole : Microtech ( Terasa Lebih Ringan di Kaki )
								Size : 39-44
								Bagian Sole di Jahit, sehingga sepatu makin kuat..
								Untuk Melihat gambar lebih jelas, Silahkan digeser potonya..
								Mohon diTulis Warna dan Ukuran sesuai Orderan
								Karena Stock barang di Toko kami cepat habis..
								Silahkan Langsung diOrder aja sebelum kehabisan
								Pengiriman sudah termasuk box ori",
        		'slug' => 'sepatu-boots-hummer-apollo',
        		'weight' => 1100,
        		'price' => 209000,
        		'category_id' => 2,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 3,
        		'name' => 'WHITELUST RHAPSODY MEN\'S SANDAL - Brown',
        		'description' => "Proudly present our official stuff.
								Inspired from musical instrumental, now RHAPSODY available with new elegant design that use new premium exclusive materials..
								Color :
								Full Black
								Black
								Brown",
        		'slug' => 'whitelust-rhapsody-men-s-sandal-brown',
        		'weight' => 1000,
        		'price' => 175000,
        		'category_id' => 1,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 4,
        		'name' => 'Sandal Pria Savero 2.0 Hitam - Hitam, 42',
        		'description' => "Savero 2.0 adalah sandal bernuansa klasik dengan sentuhan modern. Upper yang dapat diatur ukurannya dan memakai bahan ganda berlapis engineered mesh menjadikan sandal ini nyaman untuk dipakai seharian dan memiliki sirkulasi udara yang baik. Insole yang terbuat dari busa EVA juga menambah kenyamanan Savero dalam menemani kegiatan sehari-hari. Dilengkapi dengan sol TPR yang nyaman dan mengikuti gerakan naturalmu.",
        		'slug' => 'sandal-pria-savero-2-0-hitam-hitam-42',
        		'weight' => 720,
        		'price' => 199000,
        		'category_id' => 1,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        ]);
    }
}
