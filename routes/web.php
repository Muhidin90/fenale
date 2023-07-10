<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LogoutContrroller;

// Index route
// Route::get('/', function () {
//     return view('layouts.index');
// });

Route::get('/', [AdvertController::class, 'get_advert']);

// Login route
Route::get('/authentication/login', [LoginController::class, 'login'])->name('login')->middleware(['guest']);
Route::post('/authentication/login', [LoginController::class, 'store'])->middleware(['guest']);

// Logout route
Route::get('/logout', [LogoutContrroller::class, 'logout'])->name('logout');

// Register user route
Route::get('/authentication/signup', [SignUpController::class, 'signup'])->name('signup')->middleware(['guest']);
Route::post('/authentication/signup', [SignUpController::class, 'store'])->middleware(['guest']);

// Register  advert route
Route::get('/user/advert', [AdvertController::class, 'advert'])->name('advert')->middleware(['auth']);
Route::post('/user/advert', [AdvertController::class, 'store'])->name('advert_post')->middleware(['auth']);

// ADMIN ROUTES

// Register route
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard')
                                                                         ->middleware(['auth']);;

// Users route
Route::get('/admin/users', [UserController::class, 'users'])->name('admin.users')
                                                            ->middleware(['auth']);;

// adverts list
Route::get('/admin/adverts/list', [AdvertController::class, 'list'])->name('admin.adverts.list')->middleware(['auth']);;
Route::get('/admin/advert/{advert}', [AdvertController::class, 'read_advert'])->name('admin.advert')->middleware(['auth']);;


