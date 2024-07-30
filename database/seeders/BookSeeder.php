<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title'       => 'Mermaid Man dan Barnacle Boy',
            'slug'        => 'mermaid-man-dan-barnacle-boy',
            'isbn'        => '978-3-16-148410-0',
            'category_id' =>  1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi cursus semper tellus, et maximus nulla rutrum eget. Suspendisse turpis eros, blandit in nibh vel, volutpat suscipit tortor. Phasellus non dignissim risus. Cras auctor commodo lorem. Fusce sollicitudin semper risus, eu imperdiet purus lacinia vitae. Duis consequat egestas lacus, vitae sollicitudin eros.',
        ]);

        DB::table('books')->insert([
            'title'       => 'Swiper Jangan Mencuri',
            'slug'        => 'swiper-jangan-mencuri',
            'isbn'        => '978-3-16-148411-0',
            'category_id' =>  2,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi cursus semper tellus, et maximus nulla rutrum eget. Suspendisse turpis eros, blandit in nibh vel, volutpat suscipit tortor. Phasellus non dignissim risus. Cras auctor commodo lorem. Fusce sollicitudin semper risus, eu imperdiet purus lacinia vitae. Duis consequat egestas lacus, vitae sollicitudin eros.',
        ]);

        DB::table('books')->insert([
            'title'       => 'Saber Roam',
            'slug'        => 'saber-roam',
            'isbn'        => '978-3-16-148412-0',
            'category_id' =>  3,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi cursus semper tellus, et maximus nulla rutrum eget. Suspendisse turpis eros, blandit in nibh vel, volutpat suscipit tortor. Phasellus non dignissim risus. Cras auctor commodo lorem. Fusce sollicitudin semper risus, eu imperdiet purus lacinia vitae. Duis consequat egestas lacus, vitae sollicitudin eros.',
        ]);
    }
}
