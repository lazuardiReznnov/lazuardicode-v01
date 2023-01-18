<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Colt Diesel',
            'slug' => 'cd',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Category::create([
            'name' => 'Colt Diesel Double',
            'slug' => 'cdd',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Category::create([
            'name' => 'Pick Up',
            'slug' => 'pick-up',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Category::create([
            'name' => 'Tronton',
            'slug' => 'tronton',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);
        Category::create([
            'name' => 'All Unit',
            'slug' => 'all-unit',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);
    }
}
