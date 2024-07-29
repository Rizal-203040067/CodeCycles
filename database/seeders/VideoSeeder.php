<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $laravelCategory = Category::create(['name' => 'Laravel 11']);
        
        Video::create([
            'title' => 'Belajar Laravel 11 | 1. Intro',
            'keyvideo' => 'T1TR-RGf2Pw',
            'category_id' => $laravelCategory->id,
        ]);
        Video::create([
            'title' => 'Belajar Laravel 11 | 2. Instalasi & Konfigurasi',
            'keyvideo' => 'nW60yGRoUrs',
            'category_id' => $laravelCategory->id,
        ]);
        Video::create([
            'title' => 'Belajar Laravel 11 | 3. Struktur Folder',
            'keyvideo' => 'x55ndgkD2QI',
            'category_id' => $laravelCategory->id,
        ]);
        Video::create([
            'title' => 'Belajar Laravel 11 | 4. Blade Templating Engine',
            'keyvideo' => 'vDx6VA-6a6Y',
            'category_id' => $laravelCategory->id,
        ]);

        // Tambahkan video lain sesuai kebutuhan
    }
}