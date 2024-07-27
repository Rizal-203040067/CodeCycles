<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        Video::create([
            'title' => 'Belajar Laravel 11 | 1. Intro',
            'keyvideo' => 'T1TR-RGf2Pw',
        ]);
        Video::create([
            'title' => 'Belajar Laravel 11 | 2. Instalasi & Konfigurasi',
            'keyvideo' => 'nW60yGRoUrs',
        ]);
        Video::create([
            'title' => 'Belajar Laravel 11 | 3. Struktur Folder',
            'keyvideo' => 'x55ndgkD2QI',
        ]);
        Video::create([
            'title' => 'Belajar Laravel 11 | 4. Blade Templating Engine',
            'keyvideo' => 'vDx6VA-6a6Y',
        ]);

        // Tambahkan video lain sesuai kebutuhan
    }
}
