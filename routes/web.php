<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function() {
    return view('index');
});

// Authentication routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login/request', [AuthController::class, 'loginRequest'])->name('loginRequest'); 
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/request', [AuthController::class, 'registerRequest'])->name('registerRequest'); 
Route::get('logout', [AuthController::class, 'logOut'])->name('logOut');

Route::get('/home', function() {
    $user = Auth::user();
    return view('home', ['user' => $user]);
})->middleware('auth');