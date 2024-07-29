<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'       => 'Fiction',
            'slug'        => 'fiction',
        ]);

        DB::table('categories')->insert([
            'name'       => 'Action',
            'slug'        => 'action',
        ]);

        DB::table('categories')->insert([
            'name'       => 'Drama',
            'slug'        => 'drama',
        ]);

        DB::table('categories')->insert([
            'name'       => 'Mystery',
            'slug'        => 'mystery',
        ]);

        DB::table('categories')->insert([
            'name'       => 'Romance',
            'slug'        => 'romance',
        ]);
    }
}
