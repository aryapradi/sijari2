<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('page.home');
})->name('dashboard');


Route::get('/DataPartai', function () {
    return view('page.partai.table');
})->name('partai');


Route::get('/DataCaleg', function () {
    return view('page.caleg.table');
})->name('caleg');

Route::get('/DataKoor', function () {
    return view('page.koordinator.table');
})->name('koordinator');



