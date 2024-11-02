<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            [
                'id' => 1,
                'name' => 'Food',
            ],
            [
                'id' => 2,
                'name' => 'Services',
            ],
            // Add more category data as needed
        ];

        foreach ($rows as $row) {
            $category = Category::find($row['id']);
            if ($category) {
                $category->update($row);
            } else {
                Category::create($row);
            }
        }
    }
}
