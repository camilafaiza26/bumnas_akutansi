<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/variable', function (Request $request) {
    return $request->variable();
});
Route::middleware('auth:sanctum')->get('/tetap', function (Request $request) {
    return $request->tetap();
});
Route::middleware('auth:sanctum')->get('/semi', function (Request $request) {
    return $request->semi();
});
Route::middleware('auth:sanctum')->get('/riwayatperhitungan', function (Request $request) {
    return $request->perhitungan();
});
