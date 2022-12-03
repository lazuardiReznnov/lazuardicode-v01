<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mohamad Lazuardi Noor',
            'username' => 'lazuardi.reznnov',
            'email' => 'lazuardi.reznnov@gmail.com',
            'password' =>
                '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $adminRole = Role::create(['name' => 'admin']);

        $user->assignRole($adminRole);

        Profil::create([
            'user_id' => $user->id,
            'phone' => '083870524708',
            'address' => 'Sawah Baru Ciputat',
            'job' => 'Administrator|Fullstack Developer',
            'word' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum officia fugit labore illum possimus neque.',
            'twitter' => 'https://twitter.com/Lazzuardi311086',
            'facebook' => 'https://www.facebook.com/lazuardiReznnov',
            'linkedin' =>
                'https://www.linkedin.com/in/mohamad-lazuardi-noor-041aa28b/',
            'instagram' => 'https://www.instagram.com/imlazuardy/',
        ]);
    }
}
