<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     // \App\Models\User::factory(10)->create();
    // }

    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            UmkmTableSeeder::class,
            ProductTableSeeder::class,
            OrderTableSeeder::class,
            CategoryTableSeeder::class,
            ProductCategoryTableSeeder::class
        ]);
    }

}
