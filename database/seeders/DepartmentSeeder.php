<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        department::create([
            'name' => 'Finance',
            'slug' => 'finance',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, nemo.',
        ]);
        department::create([
            'name' => 'Operational',
            'slug' => 'operational',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, nemo.',
        ]);
        department::create([
            'name' => 'Repair And Maintenance',
            'slug' => 'repair-and-maintenance',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, nemo.',
        ]);
    }
}
