<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Post;
use App\Models\User;

// Non-login routes
Route::get('/', function() {
    return view('index');
});

// Authentication routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login/request', [AuthController::class, 'loginRequest'])->name('loginRequest'); 
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/request', [AuthController::class, 'registerRequest'])->name('registerRequest'); 
Route::get('logout', [AuthController::class, 'logOut'])->name('logout');

// Logged in users routes
Route::get('/home', function() {
    $user = Auth::user();

    $lastPost = Post::orderBy('id', 'desc')->first();

    $lastPostUser = User::whereId($lastPost->user_id)->first();

    $postsCount = Post::count();

    return view('home', ['user' => $user, 'lastPost' => $lastPost, 'lastPostUser' => $lastPostUser, 'postsCount' => $postsCount]);
})->middleware('auth')->name('home');

Route::get('/createpost', function() {
    return view('createPost');
})->middleware('auth')->name('createPost');

Route::get('/posts', function() {
    return view('posts');
})->middleware('auth')->name('postsIndex');

Route::get('/profile', function() {
    $user = Auth::user();

    return view('profile', ['user' => $user]);
})->middleware('auth')->name('profile');