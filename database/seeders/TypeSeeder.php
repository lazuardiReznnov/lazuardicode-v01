<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'brand_id' => 1,
            'category_id' => 2,
            'name' => 'Dutro 300 series 130HD',
            'slug' => 'dutro-130hd',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Type::create([
            'brand_id' => 1,
            'category_id' => 2,
            'name' => 'Dutro 300 series 110HD',
            'slug' => 'dutro-110hd',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Type::create([
            'brand_id' => 1,
            'category_id' => 2,
            'name' => 'Dutro 300 series 130HD Long',
            'slug' => 'dutro-130hd-l',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Type::create([
            'brand_id' => 1,
            'category_id' => 2,
            'name' => 'Dutro 300 series 130md Long',
            'slug' => 'dutro-130md-l',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Type::create([
            'brand_id' => 2,
            'category_id' => 2,
            'name' => 'Canter Super Speed 125',
            'slug' => 'canter-super-speed-125',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Type::create([
            'brand_id' => 1,
            'category_id' => 4,
            'name' => 'Ranger 500  FG 215 JE',
            'slug' => 'ranger-500-fg-215-je',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);
        Type::create([
            'brand_id' => 6,
            'category_id' => 2,
            'name' => 'Dyna 110 HD',
            'slug' => 'dyna-110-hd',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);
    }
}
