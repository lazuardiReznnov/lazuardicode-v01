<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\invStock;

class InvStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        invStock::create([
            'supplier_id' => 1,
            'name' => 'inv/002/2023',
            'slug' => 'inv-002-2023',
            'tgl' => '2023/01/01',
            'payment' => 'credit',
            'state' => 'belum',
        ]);
        invStock::create([
            'supplier_id' => 1,
            'name' => 'inv/003/2023',
            'slug' => 'inv-003-2023',
            'tgl' => '2023/01/01',
            'payment' => 'cash',
        ]);
        invStock::create([
            'supplier_id' => 2,
            'name' => 'inv/004/2023',
            'slug' => 'inv-004-2023',
            'tgl' => '2023/01/01',
            'payment' => 'credit',
            'state' => 'belum',
        ]);
        invStock::create([
            'supplier_id' => 2,
            'name' => 'inv/001/2023',
            'slug' => 'inv-001-2023',
            'tgl' => '2023/01/01',
            'payment' => 'cash',
        ]);
    }
}
