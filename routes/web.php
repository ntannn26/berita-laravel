<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;

// LOGIN
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// HALAMAN BERITA (HARUS LOGIN)
Route::get('/', [BeritaController::class, 'index'])->middleware('ceklogin');
Route::get('/create', [BeritaController::class, 'create'])->middleware('ceklogin');
Route::post('/store', [BeritaController::class, 'store'])->middleware('ceklogin');

Route::get('/edit/{id}', [BeritaController::class, 'edit'])->middleware('ceklogin');
Route::post('/update/{id}', [BeritaController::class, 'update'])->middleware('ceklogin');
Route::get('/delete/{id}', [BeritaController::class, 'destroy'])->middleware('ceklogin');