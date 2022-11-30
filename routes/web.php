<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;

// Non-login routes
Route::get('/', function() {
    return redirect('login');
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

    $tags = Post::select('tag', Post::raw('count(*) as total'))->groupBy('tag')->orderBy('total', 'desc')->get();
    $mostUsedTag = $tags[0]->tag;
    $secondMostUsedTag = $tags[1]->tag;
    $thirdMostUsedTag = $tags[2]->tag;

    return view('home', ['user' => $user, 'lastPost' => $lastPost, 'lastPostUser' => $lastPostUser, 'postsCount' => $postsCount, 'mostUsedTag' => $mostUsedTag, 'secondMostUsedTag' => $secondMostUsedTag, 'thirdMostUsedTag' => $thirdMostUsedTag]);
})->middleware('auth')->name('home');

Route::get('/createpost', function() {
    return view('createPost');
})->middleware('auth')->name('createPost');

Route::get('/posts', function() {
    return view('allposts');
})->middleware('auth')->name('postsIndex');

// Profile routes
Route::get('profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
Route::post('profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('editProfile');

// Posts routes
Route::get('posts', [PostController::class, 'showAllPosts'])->middleware('auth')->name('showAllPosts');
Route::get('posts/{tag}', [PostController::class, 'showTagPost'])->middleware('auth')->name('showPosts');
Route::get('posts/year/{year}', [PostController::class, 'showYearPost'])->middleware('auth')->name('showYearPosts');
Route::get('post/{id}', [PostController::class, 'showPost'])->middleware('auth')->name('showPost');