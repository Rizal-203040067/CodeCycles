<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/belajar', function () {
    return view('layouts.belajar');
});

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

// Route::get('/', function () {
//     return view('home', ['title' => 'Home Page']);
// });