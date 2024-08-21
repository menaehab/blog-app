<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactController;

// Theme Routes
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
});

//Subscriber Route
Route::post('/subscriber/store',[SubscriberController::class,'store'])->name('subscribe.store');

//Contact Route
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');

//Blog Route
Route::get('/my-blogs',[BlogController::class,'myBlogs'])->name('blogs.my-blogs');
Route::resource('blogs', BlogController::class)->except(['index']);

//Comment Route
Route::post('comment/store',[CommentController::class,'store'])->name('comment.store');

require __DIR__.'/auth.php';
