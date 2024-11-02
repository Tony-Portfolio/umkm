<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Seeder;

class UmkmTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Street Food Stall',
                'description' => 'Serving delicious street food.',
                'address' => '123 Street, City',
                'contact_number' => '123456789',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'name' => 'Local Barber',
                'description' => 'Expert haircuts and grooming services.',
                'address' => '456 Avenue, City',
                'contact_number' => '987654321',
            ],
            // Add more UMKM data as needed
        ];

        foreach ($rows as $row) {
            $umkm = Umkm::find($row['id']);
            if ($umkm) {
                $umkm->update($row);
            } else {
                Umkm::create($row);
            }
        }
    }
}
