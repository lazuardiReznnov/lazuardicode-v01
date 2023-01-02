<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Heropage;
use App\Models\Letter;
use Illuminate\Database\Seeder;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        return $this->call([
            UserSeeder::class,
            PermissionSeeder::class,
            HeropageSeeder::class,
            AboutSeeder::class,
            PortofolioSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            CaroserySeeder::class,
            GroupSeeder::class,
            FlagSeeder::class,
            TypeSeeder::class,
            UnitSeeder::class,
            CategoryLetterSeeder::class,
            LetterSeeder::class,
        ]);
    }
}
