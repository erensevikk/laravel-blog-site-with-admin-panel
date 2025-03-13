<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/details/{post}', [PostController::class, 'show'])->name('details');
    });

    Route::resource('my-posts', PostController::class)->parameters(['my-posts' => 'post'])->only([
        'index','create', 'store', 'edit', 'update', 'destroy'
    ])->names([
        'index'   => 'my-posts.index',
        'create'  => 'my-posts.create',
        'store'   => 'my-posts.store',
        'edit'    => 'my-posts.edit',
        'update'  => 'my-posts.update',
        'destroy' => 'my-posts.delete',
    ]);
});

Route::middleware('is_admin:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('home');

    Route::resource('post', AdminController::class)
        ->except(['index', 'show'])
        ->names([
            'create'  => 'post.create',
            'store'   => 'post.store',
            'edit'    => 'post.edit',
            'update'  => 'post.update',
            'destroy' => 'post.delete',
        ]);

    Route::get('post/index', [AdminController::class, 'show_post'])->name('post.index');

    Route::prefix('moderation')->group(function () {
        Route::put('/accept/{post}', [AdminController::class, 'acceptPost'])->name('accept.post');
        Route::put('/reject/{post}', [AdminController::class, 'rejectPost'])->name('reject.post');
    });
});

