<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'type_id' => 1,
            'carosery_id' => 1,
            'flag_id' => 1,
            'group_id' => 3,
            'name' => 'A 9232 ZA',
            'slug' => 'a-9232-za',
            'color' => 'Green',
            'vin' => 'MJEC1JG41H5159330',
            'engine_numb' => 'W04DTPJ74344',
            'year' => 2017,
            'fuel' => 'Solar',
            'cylinder' => '4009',
        ]);

        Unit::create([
            'type_id' => 1,
            'carosery_id' => 1,
            'flag_id' => 1,
            'group_id' => 3,
            'name' => 'A 9230 ZA',
            'slug' => 'a-9230-za',
            'color' => 'Green',
            'vin' => 'MJEC1JG41H5159334',
            'engine_numb' => 'W04DTPJ74348',
            'year' => 2017,
            'fuel' => 'Solar',
            'cylinder' => '4009',
        ]);
    }
}
