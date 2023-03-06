<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'pic' => '/asset/image/1.jpeg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Unit',
        ]);
        Image::create([
            'pic' => '/asset/image/2.jpeg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Unit',
        ]);

        Image::create([
            'pic' => '/asset/image/1.jpeg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Unit',
        ]);
    }
}
