<?php

use App\Models\Maren;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarenController;
use App\Http\Controllers\PontrenController;
use App\Http\Controllers\MadrasahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMarenController;
use App\Http\Controllers\DashboardLembagaController;
use App\Http\Controllers\DashboardPontrenController;
use App\Http\Controllers\DashboardKecamatanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::prefix('madrasah')->group(function () {
    Route::get('/', [MadrasahController::class, 'index'])->name('madrasah.index');
    Route::get('/{lembaga:slug}', [MadrasahController::class, 'show'])->name('madrasah.show');
});

Route::prefix('pontren')->group(function () {
    Route::get('/', [PontrenController::class, 'index'])->name('pontren.index');
    Route::get('/{lembaga:slug}', [PontrenController::class, 'show'])->name('pontren.show');
});

Route::get('/marens', [MarenController::class, 'index']);

Route::get('/marens/{maren:slug}', [MarenController::class, 'show']);

Route::get('/', [GisController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/lembagas', DashboardLembagaController::class)->middleware('auth');

Route::get('/dashboard/lembaga/checkSlug', [DashboardLembagaController::class, 'checkSlug'])->middleware('auth');


Route::get('/authors/{user:username}', [MarenController::class, 'byAuthor']);

Route::get('/kecamatans/{kecamatan:slug}', [MarenController::class, 'byKecamatan']);

// Users, Admins

Route::resource('/dashboard/marens', DashboardMarenController::class)->middleware('auth');

Route::get('/dashboard/maren/checkSlug', [DashboardMarenController::class, 'checkSlug'])->middleware('auth');

Route::get('/dashboard/kecamatan/checkSlug', [DashboardKecamatanController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/kecamatans', DashboardKecamatanController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/pontrens', DashboardPontrenController::class)->except('show')->middleware('auth');
