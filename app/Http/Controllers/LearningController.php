<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function show($categoryId, $videoId)
    {
        $category = Category::with('videos')->findOrFail($categoryId);
        $video = Video::findOrFail($videoId);

        $quiz = Quiz::where('video_id', $videoId)->with('options')->first();

        return view('belajar', compact('category', 'video', 'quiz'));
    }
}