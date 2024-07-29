<?php
// Liveware
use App\Livewire\Counter;
use App\View\Components\Nocounter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\VideoController;

// Test
Route::get('/belajars', [BelajarController::class, 'showCategories'])->name('categories');
Route::get('/belajars/{category}/{video?}', [BelajarController::class, 'showVideosByCategory'])->name('category.videos');
Route::get('/belajar/{video?}', [BelajarController::class, 'listAllVideos'])->name('belajar');
Route::get('/videos/{id}', [BelajarController::class, 'showVideoById'])->name('videos.show');


// Testes Filament
// Route::get('/belajar', [VideoController::class, 'index']);
// Route::get('/belajar/{id}', [VideoController::class, 'show']);

// Halaman Kategori
// Route::get('/categories', [BelajarController::class, 'showCategories'])->name('categories');
// Route::get('/categories/{category}', [BelajarController::class, 'showVideosByCategory'])->name('category.videos');
// Route::get('/belajar/{video?}', [BelajarController::class, 'index'])->name('belajar');


// Halaman Belajar
// Route::get('/belajar/{video?}', [BelajarController::class, 'index'])->name('belajar');

// Halaman Mahasiswa
use App\Http\Controllers\MahasiswaAuthController;

Route::group(['prefix' => 'mahasiswa'], function () {
    Route::get('/login', [MahasiswaAuthController::class, 'showLoginForm'])->name('mahasiswa.login');
    Route::post('/login', [MahasiswaAuthController::class, 'login']);
    Route::post('/logout', [MahasiswaAuthController::class, 'logout'])->name('mahasiswa.logout');
});

// Optional: Add a protected route for mahasiswa dashboard
// Route::middleware('auth:mahasiswa')->group(function () {
//     Route::get('/dashboard-mahasiswa', function () {
//         return view('mahasiswa.dashboard'); // Buat atau sesuaikan view ini
//     });
// });

// Halaman Default
Route::get('/', function () {
    return view('layouts.app');
});

// Route::get('/belajar', function () {
//     return view('layouts.belajar');
// });

// Route::get('/belajars', function () {
//     return view('layouts.belajars');
// });

Route::get('/materi', function () {
    return view('layouts.materi');
});

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/tester', function () {
    return view('layouts.tester');
});