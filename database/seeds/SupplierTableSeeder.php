<?php

use Illuminate\Database\Seeder;
use App\User;


class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Md Supplier Rahman',
            'email' => 'supplier@gmail.com',
            'password' => bcrypt('12345678'),
            'phone'=>'01925555115',
            'role'=>'supplier',
            'image'=>'defaultphoto.png',
            'is_verified'=>1

        ]);
    }
}
