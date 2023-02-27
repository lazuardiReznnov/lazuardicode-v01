<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        employee::create([
            'position_id' => '1',
            'name' => 'Hendra',
            'slug' => 'hendra',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'hendra@gmail.com',
            'address' => 'icon Verdant vile Cisauk Tangerang',
            'phone' => '000000',
            'tgl' => '2011/01/01',
        ]);
        employee::create([
            'position_id' => '5',
            'name' => 'Iwan Gunawan',
            'slug' => 'iwan-gunawan',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'iwangunawan57@gmail.com',
            'address' => 'BSD Tangerang',
            'phone' => '000000',
            'tgl' => '2011/01/01',
        ]);

        employee::create([
            'position_id' => '2',
            'name' => 'Hengky Setiawan',
            'slug' => 'hengky-setiawan',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'hengkysetiawan@gmail.com',
            'address' => 'Bogor',
            'phone' => '000000',
            'tgl' => '2017/01/01',
        ]);

        employee::create([
            'position_id' => '4',
            'name' => 'Mohamad Lazuardi Noor',
            'slug' => 'mohamad-lazuardi-noor',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'lazuardi.reznnov@gmail.com',
            'address' => 'Tangerang Selatan',
            'phone' => '000000',
            'tgl' => '2016/01/01',
        ]);

        employee::create([
            'position_id' => '12',
            'name' => 'Irwan Erawan',
            'slug' => 'irwan-erawan',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'irwanerawan31@gmail.com',
            'address' => 'Tangerang',
            'phone' => '000000',
            'tgl' => '2018/01/01',
        ]);

        employee::create([
            'position_id' => '10',
            'name' => 'Tardi',
            'slug' => 'tardi',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'tardikum@gmail.com',
            'address' => 'Tangerang',
            'phone' => '000000',
            'tgl' => '2020/01/01',
        ]);

        employee::create([
            'position_id' => '10',
            'name' => 'Ali Wijaya',
            'slug' => 'ali-wijaya',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'aliwijaya@gmail.com',
            'address' => 'Tangerang',
            'phone' => '000000',
            'tgl' => '2016/01/01',
        ]);

        employee::create([
            'position_id' => '7',
            'name' => 'Bayu Prasetya',
            'slug' => 'bayu-prasetya',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'pekapek@gmail.com',
            'address' => 'bogor',
            'phone' => '000000',
            'tgl' => '2015/01/01',
        ]);

        employee::create([
            'position_id' => '7',
            'name' => 'M. Topik Nuroni',
            'slug' => 'm-topik-nuroni',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'topnurni@gmail.com',
            'address' => 'serang',
            'phone' => '000000',
            'tgl' => '2017/01/01',
        ]);

        employee::create([
            'position_id' => '7',
            'name' => 'Sugito',
            'slug' => 'sugito',

            'idCard' => '000',
            'gender' => 'Male',
            'email' => 'sugito@gmail.com',
            'address' => 'serang',
            'phone' => '000000',
            'tgl' => '2017/01/01',
        ]);
    }
}
