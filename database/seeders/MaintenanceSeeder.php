<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maintenance;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maintenance::create([
            'unit_id' => 1,
            'name' => 'Unit Tidak Bisa Stater',
            'slug' => 'a3232za-01',
            'tgl' => '2023/02/04',
            'finish' => '2023/02/05',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorum?',
            'instruktion' => '-Cek System Stater',
            'status' => 'processing',
        ]);

        Maintenance::create([
            'unit_id' => 2,
            'name' => 'Unit Tidak Bisa Stater',
            'slug' => 'a3230za-01',
            'tgl' => '2023/02/04',
            'finish' => '2023/02/05',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorum?',
            'instruktion' => '-Cek System Stater',
            'status' => 'checking',
        ]);
    }
}
