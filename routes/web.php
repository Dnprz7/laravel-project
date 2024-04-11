<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DislikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $controller = new DashboardController();
    return $controller->index();
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::get('/profile/avatar/{filename}', [ProfileController::class, 'getImage'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/upload_image', [ImageController::class, 'create'])->name('image.create');
    Route::post('/image/save', [ImageController::class, 'save'])->name('image.save');

    Route::get('/image/file/{filename}', [ImageController::class, 'getImage'])->name('image.file');
    Route::get('/image/{id}', [ImageController::class, 'detail'])->name('image.detail');
    Route::delete('/image/delete/{id}', [ImageController::class, 'delete'])->name('image.delete');
    Route::get('/image/edit/{id}', [ImageController::class, 'edit'])->name('image.edit');
    Route::post('/image/update', [ImageController::class, 'update'])->name('image.update');


    Route::post('/comment/save', [CommentController::class, 'save'])->middleware(['verified'])->name('comment.save');
    Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->middleware(['verified'])->name('comment.delete');


    Route::get('/like/{id}', [LikeController::class, 'like'])->name('like.save');
    Route::get('/undo_like/{id}', [LikeController::class, 'undo_like'])->name('like.delete');
    Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');

    Route::get('/dislike/{id}', [DislikeController::class, 'dislike'])->name('dislike.save');
    Route::get('/undo_dislike/{id}', [DislikeController::class, 'undo_dislike'])->name('dislike.delete');
    Route::get('/dislikes', [DislikeController::class, 'index'])->name('dislike.index');


});

require __DIR__ . '/auth.php';