<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('markets')->insert([
            'name' => 'Produk A',
            'price' => 100,
            'stock' => 50,
            'brand_id' => '1',
            'category_id' => '2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('markets')->insert([
            'name' => 'Produk B',
            'price' => 150,
            'stock' => 30,
            'brand_id' => '1',
            'category_id' => '2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
