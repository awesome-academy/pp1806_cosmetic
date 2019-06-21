<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'name' => 'Make up',
                'parent_id' => 0,
            ],
            [
                'name' => 'Skin Care',
                'parent_id' => 0,
            ],
            [
                'name' => 'Hair & Body',
                'parent_id' => 0,
            ],
            [
                'name' => 'Lipstick',
                'parent_id' => 1,
            ],
            [
                'name' => 'Foundation',
                'parent_id' => 1,
            ],
            [
                'name' => 'Mascara',
                'parent_id' => 1,
            ],
            [
                'name' => 'Cleanser',
                'parent_id' => 2,
            ],
            [
                'name' => 'Sunscreen',
                'parent_id' => 2,
            ],
            [
                'name' => 'Toner',
                'parent_id' => 2,
            ],
            [
                'name' => 'Hair Care',
                'parent_id' => 3,
            ],
            [
                'name' => 'Body Care',
                'parent_id' => 3,
            ],
        ]);
    }
}
