<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Models\Comment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[PostController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/comment',[CommentController::class,'index'])->middleware(['auth', 'verified'])->name('comment');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('posts')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');

    Route::group(['prefix'=>'{post}'],function(){
        Route::get('/edit',[PostController::class,'edit'])->name('post.edit');
        Route::post('/update',[PostController::class,'update'])->name('post.update');
        Route::get('/delete',[PostController::class,'delete'])->name('post.delete');
        Route::post('/destroy',[PostController::class,'destroy'])->name('post.destroy');

        Route::get('/addComment',[CommentController::class,'create'])->name('comment.create');
    });

});    

Route::middleware('auth')->prefix('comment')->group(function () {

    Route::post('/store',[CommentController::class,'store'])->name('comment.store');

    Route::group(['prefix'=>'{comment}'],function(){
        Route::get('/edit',[CommentController::class,'edit'])->name('comment.edit');
        Route::post('/update',[CommentController::class,'update'])->name('comment.update');
        Route::get('/delete',[CommentController::class,'delete'])->name('comment.delete');
        Route::post('/destroy',[CommentController::class,'destroy'])->name('comment.destroy');


    });




});

require __DIR__.'/auth.php';
