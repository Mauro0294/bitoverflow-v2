<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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
Route::middleware(['auth'])->group(function () {
    Route::get('/', function() {
        return redirect('home');
    });

    Route::get('/home', function() {
        $user = Auth::user();

        $lastPost = Post::orderBy('id', 'desc')->first();

        $postsCount = Post::count();

        $tags = Post::select('tag', Post::raw('count(*) as total'))->groupBy('tag')->orderBy('total', 'desc')->get();

        return view('home', compact('user', 'lastPost', 'postsCount', 'tags'));
    })->name('home');

    Route::get('/createpost', function() {
        return view('createPost');
    })->name('createPost');

    Route::get('/posts', function() {
        return view('allposts');
    })->name('postsIndex');

    // Profile routes
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('profile/edit', [ProfileController::class, 'edit'])->name('editProfile');

    // Posts routes
    Route::get('posts', [PostController::class, 'showAllPosts'])->name('showAllPosts');
    Route::get('posts/{tag}', [PostController::class, 'showTagPost'])->name('showPosts');
    Route::get('posts/year/{year}', [PostController::class, 'showYearPost'])->name('showYearPosts');
    Route::get('post/{id}', [PostController::class, 'showPost'])->name('showPost');
    Route::post('posts/store', [PostController::class, 'store'])->name('storePost');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('destroyPost');

    Route::post('comments/store', [CommentController::class, 'store'])->name('storeComment');
    Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('destroyComment');

    Route::post('/comment/{id}/like', [CommentController::class, 'like'])->name('likeComment');
    Route::post('/comment/{id}/dislike', [CommentController::class, 'dislike'])->name('dislikeComment');
});