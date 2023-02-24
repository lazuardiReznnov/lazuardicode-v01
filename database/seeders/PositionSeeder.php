<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        position::create([
            'department_id' => 1,
            'name' => 'Head Finance Manager',
            'slug' => 'head-finance-manager',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        position::create([
            'department_id' => 1,
            'name' => 'Acounting',
            'slug' => 'acounting',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);

        position::create([
            'department_id' => 1,
            'name' => 'Administrator',
            'slug' => 'administrator',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
    }
}
