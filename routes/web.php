<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('admin');



Route::middleware(['auth', 'admin'])->prefix('/admin')->group(function (){
    // کاربران
    Route::resource('/users', UserController::class)->except(['show']);
    // دسته بندی
    Route::resource('/categories', CategoryController::class)->except('show');
});

Route::middleware(['auth', 'author'])->prefix('/admin')->group(function (){
    // نوشته ها
    Route::resource('/posts', PostController::class)->except('show');
    // آپلود عکس برای ویرایشگر سی کی
    Route::post('editor', [EditorController::class, 'upload'])->name('editor.upload');
    // نظرات
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
});

// احراز هویت

require __DIR__.'/auth.php';
