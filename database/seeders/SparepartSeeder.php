<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sparepart;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sparepart::create([
            'category_part_id' => '4',
            'type_id' => '5',
            'name' => 'Mediteran SC',
            'brand' => 'Pertamina',
            'slug' => 'mediteran-sc',
            'codePart' => '0000-0000',
        ]);

        sparepart::create([
            'category_part_id' => '1',
            'type_id' => '2',
            'name' => 'Upper Fuel Filter',
            'brand' => 'NN',
            'slug' => 'upper-fuel-filter',
            'codePart' => '0000-0000',
        ]);

        sparepart::create([
            'category_part_id' => '1',
            'type_id' => '2',
            'name' => 'Bottom fuel filter',
            'brand' => 'NN',
            'slug' => 'bottom-fuel-filter',
            'codePart' => '0000-0000',
        ]);
    }
}
