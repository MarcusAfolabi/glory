<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance', function () {
    return view('attendance');
});


Route::get('/attendee', function () {
    return view('attendee');
});

Route::middleware('auth')->get('/members', function () {
    return view('members');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->get('/uploadMembers', function () {
    return view('dashboard');
});
 