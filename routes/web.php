<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/materi', function () {
    return view('materi');
});

// Route::get('/', function () {
//     return view('home', ['title' => 'Home Page']);
// });