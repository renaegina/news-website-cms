<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Membuat atau menginput database
        DB::table('news')->insert([
            'title' => 'Berita Terbaru tentang COVID-19',
            'category' => 'Kesehatan',
            'author' => 'John Doe',
        ]);

    }
}
