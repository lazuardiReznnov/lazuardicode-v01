<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

use function PHPSTORM_META\map;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'sparepart_id' => 1,
            'inv_stock_id' => 1,
            'tgl' => '2023/01/05',

            'slug' => '003-1',
            'qty' => 10,
            'price' => 390000,
        ]);

        Stock::create([
            'sparepart_id' => 2,
            'inv_stock_id' => 2,
            'tgl' => '2023/01/05',

            'slug' => '003-2',
            'qty' => 10,
            'price' => 49000,
        ]);

        Stock::create([
            'sparepart_id' => 3,
            'inv_stock_id' => 1,
            'tgl' => '2023/01/05',

            'slug' => '003-3',
            'qty' => 10,
            'price' => 70000,
        ]);
    }
}
