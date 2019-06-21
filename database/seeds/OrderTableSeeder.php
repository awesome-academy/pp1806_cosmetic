<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        factory(App\Order::class, 10)->create();
        DB::table('orders')->truncate();
        DB::table('orders')->insert([
            [
                'user_id' => 2,
                'total_price' => 71,
                'description' => 'Delivery at weekend',
                'status' => 1,
                'address_shipping' => '12 Pham Hung Str, Nam Tu Liem Dist',
                'phone_number' => 12345678,
            ],
            [
                'user_id' => 3,
                'total_price' => 38,
                'description' => 'Delivery on daytime',
                'status' => 2,
                'address_shipping' => '12 Nguyen Trai Str, Thanh Xuan Dist',
                'phone_number' => 12345678,
            ],
        ]);
    }
}
