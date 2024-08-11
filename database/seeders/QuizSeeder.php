<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\Quiz;
use App\Models\QuizOption;

class QuizSeeder extends Seeder
{
    public function run()
    {
        // Temukan video pertama dalam kategori Laravel 11
        $video = Video::where('title', 'Belajar Laravel 11 | 1. Intro')->first();

        if ($video) {
            // Tambahkan kuis ke video
            $quizzes = [
                [
                    'question' => 'Apa versi Laravel yang digunakan dalam video ini?',
                    'options' => [
                        ['option' => 'Laravel 10'],
                        ['option' => 'Laravel 11'],
                        ['option' => 'Laravel 12'],
                        ['option' => 'Laravel 13'],
                    ],
                    'correct_answer' => 'Laravel 11',
                ],
                [
                    'question' => 'Apa tujuan dari Composer dalam Laravel?',
                    'options' => [
                        ['option' => 'Mengelola dependensi'],
                        ['option' => 'Mengelola database'],
                        ['option' => 'Menulis kode'],
                        ['option' => 'Membuat tampilan'],
                    ],
                    'correct_answer' => 'Mengelola dependensi',
                ],
            ];

            foreach ($quizzes as $quizData) {
                // Simpan kuis
                $quiz = Quiz::create([
                    'question' => $quizData['question'],
                    'correct_answer' => $quizData['correct_answer'],
                    'video_id' => $video->id,
                ]);

                // Simpan opsi kuis
                foreach ($quizData['options'] as $optionData) {
                    $quiz->options()->create($optionData);
                }
            }
        }
    }
}