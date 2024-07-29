<?php

// namespace App\Http\Controllers;

// use App\Models\Video;
// use Illuminate\Http\Request;

// class VideoController extends Controller
// {
//     // Method untuk menampilkan semua video di halaman index
//     public function index()
//     {
//         $videos = Video::all();
//         $video = $videos->first(); // Mengambil satu video sebagai contoh
//         return view('layouts.belajar', compact('videos', 'video'));
//     }

//     // Method untuk menampilkan video berdasarkan id
//     public function show($id)
//     {
//         $video = Video::findOrFail($id);
//         $videos = Video::all(); // Menampilkan semua video untuk daftar video di sidebar
//         return view('layouts.belajar', compact('video', 'videos'));
//     }
// }
