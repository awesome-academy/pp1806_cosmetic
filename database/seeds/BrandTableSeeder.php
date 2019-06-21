<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        factory(App\Brand::class, 10)->create();
        DB::table('brands')->truncate();
        DB::table('brands')->insert([
            ['name' => 'L.A Girls'],
            ['name' => 'The Body Shop'],
            ['name' => 'The Ordinary'],
            ['name' => 'Makeup Revolution'],
            ['name' => 'E.L.F'],
        ]);
    }
}
