<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name' => 'Sanqua Bogor',
            'slug' => 'sanqua-bogor',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Group::create([
            'name' => 'Sanqua Kuningan',
            'slug' => 'sanqua-kuningan',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Group::create([
            'name' => 'Losbak Hebel',
            'slug' => 'losbak-hebel',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Group::create([
            'name' => 'Lintas',
            'slug' => 'lintas',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);

        Group::create([
            'name' => 'kimia',
            'slug' => 'kimia',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);
    }
}
