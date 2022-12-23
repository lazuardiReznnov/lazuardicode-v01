<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portofolio;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portofolio::create([
            'name' => 'Small Website',
            'slug' => 'small-website',
            'sbody' =>
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, tempora.',
            'body' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eos porro molestias necessitatibus tempore beatae enim. Nisi deleniti quaerat illum. Officia, eaque a rem repudiandae vitae, quidem aut, eos dolorum praesentium iste doloremque ea suscipit at possimus ducimus repellendus animi nesciunt. Fugit quibusdam iusto soluta distinctio qui ab sapiente eaque.',
        ]);

        Portofolio::create([
            'name' => 'Finance Program',
            'slug' => 'finance-program',
            'sbody' =>
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, tempora.',
            'body' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eos porro molestias necessitatibus tempore beatae enim. Nisi deleniti quaerat illum. Officia, eaque a rem repudiandae vitae, quidem aut, eos dolorum praesentium iste doloremque ea suscipit at possimus ducimus repellendus animi nesciunt. Fugit quibusdam iusto soluta distinctio qui ab sapiente eaque.',
        ]);

        Portofolio::create([
            'name' => 'React Program',
            'slug' => 'react-program',
            'sbody' =>
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, tempora.',
            'body' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eos porro molestias necessitatibus tempore beatae enim. Nisi deleniti quaerat illum. Officia, eaque a rem repudiandae vitae, quidem aut, eos dolorum praesentium iste doloremque ea suscipit at possimus ducimus repellendus animi nesciunt. Fugit quibusdam iusto soluta distinctio qui ab sapiente eaque.',
        ]);
    }
}
