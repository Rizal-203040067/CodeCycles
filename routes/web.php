<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/materi', function () {
    return view('layouts.materi');
});

Route::get('/tester', function () {
    return view('layouts.tester');
});

// Route::get('/', function () {
//     return view('home', ['title' => 'Home Page']);
// });