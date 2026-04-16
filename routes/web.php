<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/', [BeritaController::class, 'index']);
Route::get('/create', [BeritaController::class, 'create']);
Route::post('/store', [BeritaController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});