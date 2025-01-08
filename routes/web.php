<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BombotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/bombot', [BombotController::class, 'index'])->name('bombot.index');
Route::get('/bombot', [BombotController::class, 'create'])->name('bombot.create');
Route::get('/bombot/{$id}', [BombotController::class, 'edit'])->name('bombot.edit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
