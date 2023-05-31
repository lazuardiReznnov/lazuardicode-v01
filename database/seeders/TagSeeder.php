<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'debt',
        ]);
        Tag::create([
            'name' => 'prive',
        ]);
        Tag::create([
            'name' => 'income',
        ]);
    }
}
