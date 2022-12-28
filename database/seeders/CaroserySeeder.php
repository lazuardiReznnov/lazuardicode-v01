<?php

namespace Database\Seeders;

use App\Models\Carosery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaroserySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carosery::Create([
            'name' => 'Flat Dek',
            'slug' => 'flat-dek',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Carosery::Create([
            'name' => 'Box',
            'slug' => 'box',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Carosery::Create([
            'name' => 'Wing Box',
            'slug' => 'wing-box',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Carosery::Create([
            'name' => 'Bak Central',
            'slug' => 'bak-central',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Carosery::Create([
            'name' => 'Bak Kayu',
            'slug' => 'bak-kayu',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Carosery::Create([
            'name' => 'Three Way',
            'slug' => 'three-way',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);
    }
}
