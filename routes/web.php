<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BombotController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

/* Bombot */
// create
Route::get('/bombot/create', [BombotController::class, 'create'])->name('bombot.create');
Route::post('/bombot', [BombotController::class, 'store'])->name('bombot.store');
// read
Route::get('/bombots', [BombotController::class, 'index'])->name('bombot.index');
// update
Route::get('/bombot/{id}/edit', [BombotController::class, 'edit'])->name('bombot.edit');
Route::put('/bombot/{id}', [BombotController::class,'update'])->name('bombot.update'); //update produk


// delete
Route::delete('/bombot/{id}', [BombotController::class, 'destroy'])->name('bombot.destroy');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Projek */
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/project/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/project/{id}', [ProjectController::class,'update'])->name('projects.update'); //update produk
