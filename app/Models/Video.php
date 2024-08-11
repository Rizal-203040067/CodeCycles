<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'keyvideo', 'category_id'];

    // Relasi many-to-many dengan Mahasiswa
    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_video')->withPivot('watched_seconds');
    }

    // Relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
