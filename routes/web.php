<?php
// Liveware
use App\Livewire\Counter;
use App\View\Components\Nocounter;
use Illuminate\Support\Facades\Route;

// Testes Filament
use App\Http\Controllers\VideoController;

Route::get('/belajar', [VideoController::class, 'index']);
Route::get('/belajar/{id}', [VideoController::class, 'show']);

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