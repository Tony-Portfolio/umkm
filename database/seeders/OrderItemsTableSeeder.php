<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'order_id' => 1, // Assuming Order ID 1
                'product_id' => 1, // Nasi Goreng
                'quantity' => 2,
                'price' => 15000.00,
            ],
            [
                'order_id' => 1,
                'product_id' => 2, // Sate Ayam
                'quantity' => 1,
                'price' => 20000.00,
            ],
            // Add more order items as needed
        ]);
    }
}
