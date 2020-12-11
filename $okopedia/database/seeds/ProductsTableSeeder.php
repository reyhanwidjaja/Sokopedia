<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['category_id'=>1,
            'product_name'=>'Iphone 11 Pro Max 256GB',
            'product_photo'=>'assets/ip11pro.png',
            'product_description'=>'Barang ready stock, original apple 100%',
            'product_price'=>24200000],

            ['category_id'=>2,
            'product_name'=>'Macbook 16" inch 2020 512GB',
            'product_photo'=>'assets/macpro.png',
            'product_description'=>'Barang ready stock, original apple 100%',
            'product_price'=>42500000],

            ['category_id'=>1,
            'product_name'=>'Samsung S20 Ultra(12/128)',
            'product_photo'=>'assets/s20ultra.png',
            'product_description'=>'Barang ready stock, original samsung 100%',
            'product_price'=>16145000],

            ['category_id'=>3,
            'product_name'=>'Mi TV 55inch 4K',
            'product_photo'=>'assets/mitv55.png',
            'product_description'=>'Barang ready stock, original xiaomi 100%',
            'product_price'=>5699000]
        ]);
    }
}
