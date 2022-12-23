<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Heropage;

class HeropageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Heropage::create([
            'heading' => ' LAZUARDI <i class="bi bi-activity"></i> CODE',
            'title' => 'Web Design | Program',
            'descriptions' => '  Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Doloribus dolorum ipsum mollitia earum magni
            minus quidem. Voluptatum in blanditiis odio.',
        ]);
    }
}
