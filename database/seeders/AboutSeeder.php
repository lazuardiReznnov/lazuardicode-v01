<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'About',
            'desc1' => '  Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Doloribus dolorum ipsum mollitia earum magni
            minus quidem. Voluptatum in blanditiis odio.',
            'desc2' => '  Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Doloribus dolorum ipsum mollitia earum magni
            minus quidem. Voluptatum in blanditiis odio.',
        ]);
    }
}
