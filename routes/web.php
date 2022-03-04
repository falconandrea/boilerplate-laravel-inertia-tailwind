<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'seo' => [
            'title' => 'Homepage',
            'description' => "This is the homepage"
        ]
    ]);
})->name('home');

// Login & Register
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.store')->middleware('guest');
Route::get('/register', [AuthController::class, 'show_register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.store')->middleware('guest');
Route::delete('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Dashboard
Route:: get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
