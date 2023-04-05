<?php

namespace Database\Seeders;

use App\Models\customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'PT. Indomultimas Perkasa',
                'slug' => 'imp',
                'phone' => '021223024',
                'email' => 'suplychain@sanqua.com',
                'address' =>
                    'Jl. Raya Pahlawan Km 0.5 No. 48 Karang Asem Barat, Citeureup - Bagor, West Karang Asem, Cibinong, Bogor ',
            ],
            [
                'name' => 'PT. Alfa Bangun Persada',
                'slug' => 'alfa',
                'phone' => '0254 402111',
                'email' => 'alfa@gmail.com',
                'address' =>
                    ' Kav 11, Jl. C B A Raya, Majasari, Jawilan, Serang',
            ],
            [
                'name' => 'PT. MITRA LIGHT BLOCK',
                'slug' => 'mlb',
                'phone' => '0254 8497180',
                'email' => 'mlb@gmail.com',
                'address' =>
                    ' Cemplang, Kec. Jawilan, Kabupaten Serang, Banten 42177',
            ],
            [
                'name' => 'PT Sahabat Citra Wibawa',
                'slug' => 'scw',
                'phone' => '0254 8497180',
                'email' => 'scw@gmail.com',
                'address' =>
                    'Jl. Danau Sunter Barat No.4, RT.4/RW.7, Sunter Agung, Tanjung Priok,',
            ],
        ];

        customer::insert($data);
    }
}
