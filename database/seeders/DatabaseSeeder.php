<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Database\Seeders\BookSeeder;
// use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UserSeeder::class,
        //     BookSeeder::class,
        // ]);
        $this->call([
            AdminSeeder::class,
        ]);
    }
}
