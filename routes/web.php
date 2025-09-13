<?php

use App\Models\Maren;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarenController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMarenController;
use App\Http\Controllers\DashboardLembagaController;
use App\Http\Controllers\DashboardPontrenController;
use App\Http\Controllers\DashboardKecamatanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [GisController::class, 'index']);

Route::get('/madrasah', function () {
    return view('madrasah', ['title' => 'Madrasah']);
});

Route::get('/pontren', function () {
    return view('pontren', ['title' => 'Pesantren']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/lembagas', DashboardLembagaController::class)->middleware('auth');

Route::get('/dashboard/lembaga/checkSlug', [DashboardLembagaController::class, 'checkSlug'])->middleware('auth');





Route::get('/about', function () {

    $marens = Maren::latest();

    $marens->whereHas('kecamatan', function ($query) {
        $query->whereIn('name',  ['Lubuk Sikaping', 'Dua Koto']);
    });

    // Mengirimkan data yang sudah difilter ke view
    return view('about', [
        'title' => 'Kecamatan',
        'marens' => $marens->get()
    ]);
});

Route::get('/marens', [MarenController::class, 'index']);

Route::get('/marens/{maren:slug}', [MarenController::class, 'show']);

Route::get('/authors/{user:username}', [MarenController::class, 'byAuthor']);

Route::get('/kecamatans/{kecamatan:slug}', [MarenController::class, 'byKecamatan']);

// Users, Admins

Route::resource('/dashboard/marens', DashboardMarenController::class)->middleware('auth');

// Route::get('/dashboard/giss', [DashboardGisController::class, 'index'])->middleware('auth');

Route::get('/dashboard/maren/checkSlug', [DashboardMarenController::class, 'checkSlug'])->middleware('auth');

Route::get('/dashboard/kecamatan/checkSlug', [DashboardKecamatanController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/kecamatans', DashboardKecamatanController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/pontrens', DashboardPontrenController::class)->except('show')->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
});
