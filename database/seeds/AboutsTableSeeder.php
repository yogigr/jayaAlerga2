<?php

use Illuminate\Database\Seeder;
use App\About;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
        	'company_name' => 'Jaya Alerga',
        	'company_desc' =>
        	"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        	'address' => 'Blok Pajagan Desa Cipasung Kecamatan Lemahsugih',
        	'city_id' => 252,
        	'province_id' => 9,
            'postal_code' => '45465',
        	'phone1' => '085224800600',
        	'email' => 'jayaalerga@gmail.com',
        ]);
    }
}
