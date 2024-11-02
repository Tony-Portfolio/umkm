<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            [
                'id' => 1,
                'umkm_id' => 1,
                'name' => 'Nasi Goreng',
                'description' => 'Fried rice with vegetables and chicken.',
                'price' => 15000,
                'stock' => 20,
            ],
            [
                'id' => 2,
                'umkm_id' => 2,
                'name' => 'Haircut',
                'description' => 'Professional haircut for men.',
                'price' => 50000,
                'stock' => 10,
            ],
            // Add more product data as needed
        ];

        foreach ($rows as $row) {
            $product = Product::find($row['id']);
            if ($product) {
                $product->update($row);
            } else {
                Product::create($row);
            }
        }
    }
}
