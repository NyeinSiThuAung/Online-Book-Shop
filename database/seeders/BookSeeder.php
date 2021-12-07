<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 4; $i++){
            DB::table('books')->insert([
                'name' => 'book' .$i,
                'category_id' => $i,
                'author_id' => $i,
                'description' => Str::random(500),
                'price' => '2000',
                'image' => 'image' .$i,
            ]);
        }
    }
}
