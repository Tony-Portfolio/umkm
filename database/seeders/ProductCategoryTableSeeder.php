<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            [
                'product_id' => 1,
                'category_id' => 1,
            ],
            [
                'product_id' => 1,
                'category_id' => 2,
            ],
            [
                'product_id' => 2,
                'category_id' => 2,
            ],
            // Add more product-category relationships as needed
        ];

        foreach ($rows as $row) {
            $product = Product::find($row['product_id']);
            $category = Category::find($row['category_id']);

            if ($product && $category) {
                // Check if the relationship already exists
                if (!$product->categories()->where('category_id', $row['category_id'])->exists()) {
                    $product->categories()->attach($row['category_id']);
                }
            }
        }
    }
}
