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
        // 1
        position::create([
            'department_id' => 4,
            'name' => 'Directur',
            'slug' => '04-direktur',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 2
        position::create([
            'department_id' => 1,
            'name' => 'Head Finance Officer',
            'slug' => '01-head-finance-officer',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 3
        position::create([
            'department_id' => 1,
            'name' => 'Acounting',
            'slug' => '02-acounting',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 4
        position::create([
            'department_id' => 1,
            'name' => 'Administrator',
            'slug' => '03-administrator',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 5
        position::create([
            'department_id' => 2,
            'name' => 'Manager',
            'slug' => '01-manager',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 6
        position::create([
            'department_id' => 2,
            'name' => 'Suport Manager',
            'slug' => '03-suport-manager',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 7
        position::create([
            'department_id' => 2,
            'name' => 'Field Manager',
            'slug' => '02-manager',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 8
        position::create([
            'department_id' => 2,
            'name' => 'driver',
            'slug' => '02-driver',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 9
        position::create([
            'department_id' => 3,
            'name' => 'Service Advisor',
            'slug' => '03-service-advisor',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 10
        position::create([
            'department_id' => 3,
            'name' => 'Mechanic',
            'slug' => '03-mechanic',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 11
        position::create([
            'department_id' => 3,
            'name' => 'Helper',
            'slug' => '03-helper',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
        // 12
        position::create([
            'department_id' => 3,
            'name' => 'Warehouse Manager',
            'slug' => '03-warehouse-manager',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, iste.',
        ]);
    }
}
