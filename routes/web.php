<?php
// Liveware
use App\Livewire\Counter;
use App\View\Components\Nocounter;
use Illuminate\Support\Facades\Route;

// Testes Filament
use App\Http\Controllers\VideoController;

Route::get('/belajar', [VideoController::class, 'index']);
Route::get('/belajar/{id}', [VideoController::class, 'show']);

// Default
use App\Http\Controllers\MahasiswaAuthController;

// routes/web.php
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

Route::get('/', function () {
    return view('layouts.app');
});

// Route::get('/belajar', function () {
//     return view('layouts.belajar');
// });

Route::get('/belajars', function () {
    return view('layouts.belajars');
});

Route::get('/materi', function () {
    return view('layouts.materi');
});

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/tester', function () {
    return view('layouts.tester');
});

// Liveware
Route::get('/nocounter', Nocounter::class);
 
Route::get('/counter', Counter::class);

// Route::get('/', function () {
//     return view('home', ['title' => 'Home Page']);
// });