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

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('welcome');
Route::get('/delete/{id}/user', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
Route::post('/selected-user', [App\Http\Controllers\UserController::class, 'userSelectedDelete'])->name('user.delete');
