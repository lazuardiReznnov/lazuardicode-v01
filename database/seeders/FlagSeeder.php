<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\flag;

class FlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flag::create([
            'name' => 'PT GEMA CIPTA GEMILANG',
            'slug' => 'gcg',
            'email' => 'gemaciptagemilang@gmail.com',
            'address' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'phone' => '021-2220000',
        ]);

        Flag::create([
            'name' => 'PT GEMA BERKAT GEMILANG',
            'slug' => 'gbg',
            'email' => 'gemaberkatgemilang@gmail.com',
            'address' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'phone' => '021-2220000',
        ]);

        Flag::create([
            'name' => 'PT GEMA SINAR GEMILANG',
            'slug' => 'gsg',
            'email' => 'gemasinargemilang@gmail.com',
            'address' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'phone' => '021-2220000',
        ]);

        Flag::create([
            'name' => 'PT SETIA PRATAMA MANDIRI',
            'slug' => 'spl',
            'email' => 'setiapratamalogistik@gmail.com',
            'address' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'phone' => '021-2220000',
        ]);

        Flag::create([
            'name' => 'PT TRIRAKSA JAYA MANDIRI',
            'slug' => 'tjm',
            'email' => 'triraksajayamandirig@gmail.com',
            'address' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'phone' => '021-2220000',
        ]);

        Flag::create([
            'name' => 'PT CAHAYA GEMILANG AUTOMOBILINDO',
            'slug' => 'cga',
            'email' => 'cahayagemilangauto@gmail.com',
            'address' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'phone' => '021-2220000',
        ]);

        Flag::create([
            'name' => 'CV. GEMA MAKMUR ABADI',
            'slug' => 'gma',
            'email' => 'gemamakmurabadi@gmail.com',
            'address' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'phone' => '021-2220000',
        ]);
    }
}
