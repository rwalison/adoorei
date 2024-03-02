<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sale_products')->insert([
            'sale_id' => '202300000',
            'product_id' => 1,
            'name' => 'Celular 1',
            'price' => 1.800,
            'description' => 'Lorenzo Ipsulum',
            'amount' => 3
        ]);

        DB::table('sale_products')->insert([
            'sale_id' => '202300000',
            'product_id' => 2,
            'name' => 'Celular 2',
            'price' => 3.200,
            'description' => 'Lorem ipsum dolor',
            'amount' => 1
        ]);

        DB::table('sale_products')->insert([
            'sale_id' => '202300000',
            'product_id' => 3,
            'name' => 'Celular 3',
            'price' => 9.800,
            'description' => 'Lorem ipsum dolor sit amet',
            'amount' => 2
        ]);
    }
}
