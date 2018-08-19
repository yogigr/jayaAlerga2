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
        		'name' => 'Sepatu Kerja Formal JT100',
        		'description' => "Sepatu ini diproduksi dengan sangat teliti dan presisi dari semua sisi dengan perhitungan yang sangat akurat yaitu hitungan milimeter dan kemiringan yang diperhitungkan setiap derajatnya. Dengan memeperhatikan bentuk anatomi kaki manusia produk ini diproduksi sehingga tidak bertentangan dengan prinsip-prinsip ortopedi.",
        		'slug' => 'sepatu-kerja-formal-jt100',
        		'weight' => 800,
        		'price' => 189000,
        		'category_id' => 2,
                'photo' => 'sepatu-kerja-formal-jt100.jpg',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 2,
        		'name' => 'Sepatu Hummer Apollo',
        		'description' => "Material : Premium Leather
Sole : Microtech ( Terasa Lebih Ringan di Kaki )
Size : 39-44
Bagian Sole di Jahit, sehingga sepatu makin kuat..
Untuk Melihat gambar lebih jelas, Silahkan digeser potonya..
Mohon diTulis Warna dan Ukuran sesuai Orderan
Karena Stock barang di Toko kami cepat habis..
Silahkan Langsung diOrder aja sebelum kehabisan
Pengiriman sudah termasuk box ori",
        		'slug' => 'sepatu-hummer-apollo',
        		'weight' => 1100,
        		'price' => 209000,
        		'category_id' => 2,
                'photo' => 'sepatu-hummer-apollo.jpg',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 3,
        		'name' => 'WHITELUST RHAPSODY SANDAL',
        		'description' => "Proudly present our official stuff.
Inspired from musical instrumental, now RHAPSODY available with new elegant design that use new premium exclusive materials..
Color :
Full Black
Black
Brown",
        		'slug' => 'whitelust-rhapsody-sandal',
        		'weight' => 1000,
        		'price' => 175000,
        		'category_id' => 1,
                'photo' => 'whitelust-rhapsody-sandal.png',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 4,
        		'name' => 'Sandal Savero 2.0 Hitam',
        		'description' => "Savero 2.0 adalah sandal bernuansa klasik dengan sentuhan modern. Upper yang dapat diatur ukurannya dan memakai bahan ganda berlapis engineered mesh menjadikan sandal ini nyaman untuk dipakai seharian dan memiliki sirkulasi udara yang baik. Insole yang terbuat dari busa EVA juga menambah kenyamanan Savero dalam menemani kegiatan sehari-hari. Dilengkapi dengan sol TPR yang nyaman dan mengikuti gerakan naturalmu.",
        		'slug' => 'sandal-savero-20-hitam',
        		'weight' => 720,
        		'price' => 199000,
        		'category_id' => 1,
                'photo' => 'sandal-savero-20-hitam.jpg',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        ]);
    }
}
