<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('order_products')->truncate();
        DB::table('order_products')->insert([
            [
                'order_id' => 1,
                'product_id' => 4,
                'quantity' => 1,
            ],
            [
                'order_id' => 2,
                'product_id' => 1,
                'quantity' => 1,
            ],
        ]);
    }
}
