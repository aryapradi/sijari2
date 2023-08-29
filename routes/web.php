<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalegController;
use App\Http\Controllers\PartaiController;
use App\Http\Controllers\KoordinatorController;

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

Route::get('/', [HomeController::class,'home'])->name('dashboard');

//Route Partai
Route::get('/DataPartai', [PartaiController::class,'partai'])->name('partai');
Route::get('/create_partai',[PartaiController::class,'create_partai'])->name('create_partai');
Route::post('/store_partai',[PartaiController::class,'store_partai'])->name('store_partai');
Route::get('/edit_partai/{id}',[PartaiController::class,'edit_partai'])->name('edit_partai');
Route::post('/update_partai/{id}',[PartaiController::class,'update_partai'])->name('update_partai');
Route::delete('/hapus_partai/{id}',[PartaiController::class,'hapus_partai'])->name('hapus_partai');

//Route Caleg
Route::get('/DataCaleg',[CalegController::class,'caleg'])->name('caleg');
Route::get('/create_caleg',[CalegController::class,'create_caleg'])->name('create_caleg');
Route::post('/store_caleg',[CalegController::class,'store_caleg'])->name('store_caleg');
Route::get('/edit_caleg/{id}',[CalegController::class,'edit_caleg'])->name('edit_caleg');
Route::post('/update_caleg/{id}',[CalegController::class,'update_caleg'])->name('update_caleg');
Route::get('/hapus_caleg/{id}',[CalegController::class,'hapus_caleg'])->name('hapus_caleg');

//Route Koordinator
Route::get('/DataKoor',[KoordinatorController::class,'koordinator'])->name('koordinator');
Route::get('/create_koordinator',[KoordinatorController::class,'create_koordinator'])->name('create_koordinator');
Route::post('/store_koordinator',[KoordinatorController::class,'store_koordinator'])->name('store_koordinator');
// Route::group(['prefix' => 'store_koordinator', 'as' => 'store_koordinator.'], function () {

//     // Route untuk mengambil data provinsi, kabupaten, kecamatan, dan desa
//     Route::get('/get-provinsi-options/{id}', 'KoordinatorController@getProvinsiOptions')->name('get-provinsi-options');
//     Route::get('/get-kabupaten-options/{id_provinsi}', 'KoordinatorController@getKabupatenOptions')->name('get-kabupaten-options');
//     Route::get('/get-kecamatan-options/{id_kabupaten}', 'KoordinatorController@getKecamatanOptions')->name('get-kecamatan-options');
//     Route::get('/get-desa-options/{id_kecamatan}', 'KoordinatorController@getDesaOptions')->name('get-desa-options');
// });




