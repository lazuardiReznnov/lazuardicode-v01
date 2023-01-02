<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryLetter;

class CategoryLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoryletter::create([
            'name' => 'vehicle registration Certificate',
            'slug' => 'vrc',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, similique.',
        ]);

        Categoryletter::create([
            'name' => 'vehicle Inspection Certificate',
            'slug' => 'vic',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, similique.',
        ]);
    }
}
