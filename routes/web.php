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
Route::controller(AuthController::class)
    ->group(function() {
        Route::get('login', 'login')->name('login');
        Route::post('login/request', 'loginRequest')->name('loginRequest');
        Route::get('register', 'register')->name('register');
        Route::post('register/request', 'registerRequest')->name('registerRequest');
        Route::get('logout', 'logOut')->name('logout');
    });

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
    Route::controller(ProfileController::class)
        ->group(function() {
            Route::get('profile', 'show')->name('profile');
            Route::post('profile/edit', 'edit')->name('editProfile');
            Route::get('user/{id}', 'showUser')->name('showUser');
        });

    // Posts routes
    Route::controller(PostController::class)
        ->group(function() {
            Route::get('posts', 'showAllPosts')->name('showAllPosts');
            Route::get('posts/{tag}', 'showTagPost')->name('showPosts');
            Route::get('posts/year/{year}', 'showYearPost')->name('showYearPosts');
            Route::get('post/{id}', 'showPost')->name('showPost');
            Route::post('posts/store', 'store')->name('storePost');
            Route::delete('post/{id}', 'destroy')->name('destroyPost');
        });
});