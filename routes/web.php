<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

// Route::get('/', function () {
//     return Inertia::render('Home', ['user' => Auth::user()]);
// })->name('home');


Route::get('/about', function () {
    return inertia('About');
});

// URI - Blade - Data
// Route::inertia('user', 'Users', ['username'=>'Mahmoud']);
Route::get('/profile', [UserController::class, 'index']);

// Route::inertia('/register', 'Auth/Register');

// Register with UseForm
// Route::inertia('/register', 'Auth/RegisterWithUseForm')->name('register');

// Register with Form Component
Route::inertia('/register', 'Auth/RegisterWithForm')->name('register');

Route::post('/register', [AuthController::class, 'register']);

// Login with Form Component
Route::inertia('/login', 'Auth/Login')->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/update-avatar', [UserController::class, 'updateAvatar'])->name('update-avatar');

Route::resource('posts', PostController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
