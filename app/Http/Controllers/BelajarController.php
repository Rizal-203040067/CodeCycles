<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    // Method untuk menampilkan semua kategori
     public function showCategories()
    {
        $categories = Category::all();
        return view('layouts.belajars', compact('categories'));
    }

    // Method untuk menampilkan video berdasarkan kategori
    public function showVideosByCategory(Category $category, $videoId = null)
    {
        $categories = Category::with('videos')->get();
        $video = $videoId ? Video::findOrFail($videoId) : $category->videos->first();
        return view('layouts.belajar', compact('categories', 'video', 'category'));
    }

    // Method untuk menampilkan semua video di halaman index
    public function listAllVideos()
    {
        $videos = Video::all();
        $video = $videos->first();
        return view('layouts.belajar', compact('videos', 'video'));
    }

    // Method untuk menampilkan video berdasarkan id
    public function showVideoById($id)
    {
        $video = Video::findOrFail($id);
        $videos = Video::all();
        return view('layouts.belajar', compact('video', 'videos'));
    }
}