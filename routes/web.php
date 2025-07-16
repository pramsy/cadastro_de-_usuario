<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\UsuarioWebController;

Route::get('/', [UsuarioWebController::class, 'inicio'])->name('users.inicio');
Route::get('/create', [UsuarioWebController::class, 'create'])->name('users.create');
Route::post('/users', [UsuarioWebController::class, 'store'])->name('users.store');
Route::get('/users', [UsuarioWebController::class, 'lista'])->name('users.lista');
Route::get('/read/{id}', [UsuarioWebController::class, 'show'])->name('users.read');
Route::get('/edit/{id}', [UsuarioWebController::class, 'edit'])->name('users.edit');
Route::put('/edit/{id}', [UsuarioWebController::class, 'update'])->name('users.update');
Route::delete('/delete/{id}', [UsuarioWebController::class, 'destroy'])->name('users.destroy');

