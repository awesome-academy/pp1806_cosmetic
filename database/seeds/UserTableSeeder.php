<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        factory(App\User::class, 1)->create();
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 12345678,
                'phone_number' => '12345678',
                'address' => '',
                'image' => '',
                'role' => 1,

            ],
            [
                'name' => 'huong',
                'email' => 'huong@gmail.com',
                'password' => 12345678,
                'phone_number' => '12345678',
                'address' => '',
                'image' => '',
                'role' => 0,

            ],
            [
                'name' => 'trang',
                'email' => 'trang@gmail.com',
                'password' => 12345678,
                'phone_number' => '12345678',
                'address' => '',
                'image' => '',
                'role' => 1,

            ],
        ]);
    }
}
