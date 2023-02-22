<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categoryPart;

class CategoryPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categoryPart::create([
            'name' => 'Fuel System',
            'slug' => 'fuel-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Ignation System',
            'slug' => 'ignation-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Cooling System',
            'slug' => 'cooling-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Lubricating System',
            'slug' => 'lubricating-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Transmission System',
            'slug' => 'transmission-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Drive Train',
            'slug' => 'drive-train',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Electrical System',
            'slug' => 'electrical-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Brake System',
            'slug' => 'brake-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);

        categoryPart::create([
            'name' => 'Body',
            'slug' => 'body',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);
        categoryPart::create([
            'name' => 'Steering System',
            'slug' => 'steering-system',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);
        categoryPart::create([
            'name' => 'Wheel',
            'slug' => 'wheel',
            'descriptions' =>
                'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, numquam?',
        ]);
    }
}
