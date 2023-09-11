<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalegController;
use App\Http\Controllers\PartaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\KoordinatorTps;
use App\Http\Controllers\KoordinatorTpsController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\TokenController;

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

// Route::get('/', [HomeController::class,'home'])->name('dashboard');
// Route::get('/login',[LoginController::class,'login'])->name('login');
// Route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route User
Route::get('/DataUser', [UserController::class,'user'])->name('user');

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

//Route Fassilitator
Route::get('/DataKoor',[KoordinatorController::class,'koordinator'])->name('koordinator');
Route::get('/create_koordinator',[KoordinatorController::class,'create_koordinator'])->name('create_koordinator');
Route::group(['prefix' => 'store'], function () {
    Route::get('/store_koordinator/get-locations', [KoordinatorController::class, 'getLocations']);
    Route::post('/store_koordinator', [KoordinatorController::class, 'store_koordinator'])->name('store_koordinator');
});
Route::get('/edit_koordinator/{id}',[KoordinatorController::class,'edit_koordinator'])->name('edit_koordinator');
Route::post('/update_koordinator/{id}',[KoordinatorController::class,'update_koordinator'])->name('update_koordinator');
Route::get('/hapus_koordinator/{id}',[KoordinatorController::class,'hapus_koordinator'])->name('hapus_koordinator');

// Route DPT
Route::get('/DataDPT', [DptController::class, 'dpt'])->name('dpt');
Route::get('/export_dpt', [DptController::class, 'export_dpt'])->name('export_dpt');
Route::post('/import_dpt', [DptController::class, 'import_dpt'])->name('import_dpt');
Route::get('/download_Template', [DptController::class, 'download_Template'])->name('download_Template');
Route::get('/delete_all_data', [DptController::class, 'deleteAllData'])->name('delete_all_data');
Route::get('/detail_dpt/{id}', [DptController::class, 'detail_dpt'])->name('detail_dpt');

// ROUTE Koordinator tps
Route::get('/DataKoorTPS',[KoordinatorTpsController::class,'koordinatortps'])->name('saksi');
Route::post('/GetSaksi',[KoordinatorTpsController::class,'jadikan_koorTps'])->name('getsaksi');
Route::get('/edit_koortps/{id}',[KoordinatorTpsController::class,'edit_koortps'])->name('edit_koortps');
Route::post('/update_koortps/{id}',[KoordinatorTpsController::class,'update_koortps'])->name('update_koortps');
Route::get('/hapus_koortps/{id}',[KoordinatorTpsController::class,'koortps'])->name('koortps');

//Route Pemilih
Route::get('/DataPemilih',[PemilihController::class,'pemilih'])->name('pemilih');
Route::post('/GetPemilih',[PemilihController::class,'jadikan_pemilih'])->name('getpemilih');
Route::get('/edit_pemilih/{id}',[PemilihController::class,'edit_pemilih'])->name('edit_pemilih');
Route::post('/update_pemilih/{id}',[PemilihController::class,'update_pemilih'])->name('update_pemilih');
Route::get('/hapus_pemilih/{id}',[PemilihController::class,'hapus_pemilih'])->name('hapus_pemilih');

//Route Token 
Route::get('/DataToken',[TokenController::class,'token'])->name('token');
Route::get('/ubah_token/{id}',[TokenController::class,'ubah_token'])->name('ubah_token');
Route::post('/update_token/{id}',[TokenController::class,'update_token'])->name('update_token');




