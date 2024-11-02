<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            [
                'id' => 1,
                'user_id' => 1,
                'total' => 30000,
                'status' => 'completed',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'total' => 50000,
                'status' => 'pending',
            ],
            // Add more order data as needed
        ];

        foreach ($rows as $row) {
            $order = Order::find($row['id']);
            if ($order) {
                $order->update($row);
            } else {
                Order::create($row);
            }
        }
    }
}
