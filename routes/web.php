<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalkulasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PerkegiatanController;
use App\Http\Controllers\SemiController;
use App\Http\Controllers\TetapController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\VariableController;
use App\Http\Livewire\CreateKegiatan;
use App\Models\Perhitungan;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Livewire\CreateKalkulasi;

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
    return view('welcome');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::get('/dashboard', [ DashboardController::class ,"index_view"])->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');


    Route::get('/rencanakegiatan', [KegiatanController::class,"index_view" ])->name('rencanakegiatan');
    Route::view('/rencanakegiatan/new', "pages.user.kegiatan-new")->name('rencanakegiatan.new');
    Route::view('/rencanakegiatan/edit/{kegiatanId}', "pages.user.kegiatan-edit")->name('rencanakegiatan.edit');

    Route::get('/rencanakegiatan/{kegiatanId}/pendapatan', [PendapatanController::class,"index_view" ])->name('datakeuangan');
    Route::get('/rencanakegiatan/{kegiatanId}/pendapatan/new', [PendapatanController::class,"createView"])->name('pendapatan.new');
    // Route::view('/rencanakegiatan/{kegiatanId}/pendapatan/edit/{pendapatanId}', "pages.user.kegiatan-edit")->name('rencanakegiatan.edit');

    Route::get('/rencanakegiatan/{kegiatanId}/variable', [ VariableController::class, "index_view" ])->name('variable');
    Route::get('/rencanakegiatan/{kegiatanId}/variable/new', [VariableController::class,"createView"])->name('variable.new');
    // Route::view('/variable/edit/{variableId}', "pages.user.variable-edit")->name('variable.edit');

    Route::get('/rencanakegiatan/{kegiatanId}/semi', [ SemiController::class, "index_view" ])->name('semi');
    Route::get('/rencanakegiatan/{kegiatanId}/semi/new', [SemiController::class,"createView"])->name('semi.new');   
    // Route::view('/semi/edit/{semiId}', "pages.user.semi-edit")->name('semi.edit');

    Route::get('/rencanakegiatan/{kegiatanId}/tetap', [ TetapController::class, "index_view" ])->name('tetap');
    Route::get('/rencanakegiatan/{kegiatanId}/tetap/new', [TetapController::class,"createView"])->name('tetap.new');
    // Route::view('/tetap/edit/{tetapId}', "pages.user.tetap-edit")->name('tetap.edit');

    Route::get('/rencanakegiatan/{kegiatanId}/perhitungan', [PerkegiatanController::class,"index_view" ])->name('perkegiatan');


    Route::get('/rencanakegiatan/{kegiatanId}/perhitungan/new', [PerkegiatanController::class,"kalkulasi_view" ])->name('kalkulasi');
    Route::get('/rencanakegiatan/{kegiatanId}/perhitungan/konfirm', [PerkegiatanController::class,"create" ])->name('kalkulasi.konfirm');
    Route::get('/rencanakegiatan/{kegiatanId}/perhitungan/store', [PerkegiatanController::class,"storeP" ])->name('kalkulasi.store');


    
    Route::get('/riwayatperhitungan', [PerhitunganController::class,"index_view" ])->name('perhitungan');
    Route::get('/export-riwayatperhitungan', [PerhitunganController::class,"exportIntoExcel" ])->name('perhitungan.export');
});
