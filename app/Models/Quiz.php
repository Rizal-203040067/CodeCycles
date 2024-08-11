<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'correct_answer', 'video_id'];

    public function options()
    {
        return $this->hasMany(QuizOption::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}