<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name' => 'Mitra Maju',
            'slug' => 'mitra-maju',
            'tlp' => '021-33002210',
            'email' => 'mitramaju@gmail.com',
            'address' => 'serpong',
        ]);

        Supplier::create([
            'name' => 'Maju Jaya',
            'slug' => 'maju-jaya',
            'tlp' => '021-3300220',
            'email' => 'majujaya@gmail.com',
            'address' => 'Pamulang',
        ]);
    }
}
