<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

// Route::group()

// Route::get('/register', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('welcome');
// });


