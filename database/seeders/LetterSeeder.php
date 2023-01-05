<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Letter;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Letter::create([
            'category_letter_id' => 1,
            'unit_id' => 1,
            'regNum' => '18741489BT/MJ/2017',
            'slug' => '18741489BT-mj-2017',
            'owner' => 'PT GEMA CIPTA GEMILANG',
            'owner_add' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'reg_year' => '2017',
            'loc_code' => '70-UPT Balaraja',
            'lpc' => 'Yellow',
            'vodn' => 'N07905769H1',
            'tax' => '2022/09/11',
            'expire_date' => '2022/09/11',
        ]);

        Letter::create([
            'category_letter_id' => 1,
            'unit_id' => 2,
            'regNum' => '18741487BT/MJ/2017',
            'slug' => '18741487bt-mj-2017',
            'owner' => 'PT GEMA CIPTA GEMILANG',
            'owner_add' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'reg_year' => '2017',
            'loc_code' => '70-UPT Balaraja',
            'lpc' => 'Yellow',
            'vodn' => 'N07905767H1',
            'tax' => '2022/09/11',
            'expire_date' => '2022/09/11',
        ]);

        Letter::create([
            'category_letter_id' => 2,
            'unit_id' => 1,
            'regNum' => 'BB03C17000365',
            'slug' => 'bb03c17000365',
            'owner' => 'PT GEMA CIPTA GEMILANG',
            'owner_add' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'reg_year' => '2017',
            'loc_code' => '70-UPT Balaraja',
            'expire_date' => '2022/08/04',
        ]);
        Letter::create([
            'category_letter_id' => 2,
            'unit_id' => 2,
            'regNum' => 'BB03C17000366',
            'slug' => 'bb03c17000366',
            'owner' => 'PT GEMA CIPTA GEMILANG',
            'owner_add' => 'Jl. Raya Korelet Kabupaten Tangerang',
            'reg_year' => '2017',
            'loc_code' => '70-UPT Balaraja',
            'expire_date' => '2022/08/04',
        ]);
    }
}
