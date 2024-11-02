<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            [
                'id' => 1, // Assuming you want to set specific IDs
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'), // Always hash passwords
                'role' => 'admin', // You can add additional fields as necessary
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password'),
                'role' => 'user',
            ],
            // Add more users as needed
        ];

        foreach ($rows as $row) {
            // Find user by ID
            $user = User::find($row['id']);
            if ($user) {
                // Update existing user
                $user->update($row);
            } else {
                // Create new user
                User::create($row);
            }
        }
    }
}
