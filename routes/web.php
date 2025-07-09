<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\UsuarioWebController;

Route::get('/', [UsuarioWebController::class, 'inicio'])->name('users.inicio');
Route::get('/create', [UsuarioWebController::class, 'create'])->name('users.create');
Route::post('/users', [UsuarioWebController::class, 'store'])->name('users.store');
Route::get('/users', [UsuarioWebController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UsuarioWebController::class, 'show'])->name('users.show');

