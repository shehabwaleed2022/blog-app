<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::controller(PostController::class)->group(function () {
  Route::get('/', 'index')->name('home')->middleware('auth');
  Route::get('posts/{post}', 'show')->name('posts.show');
  Route::get('admin/posts/create', 'create')->name('admin.posts.create')->middleware('admin');
  Route::post('admin/posts/create', 'store')->name('admin.posts.create.store')->middleware('admin');
});


Route::controller(RegisterController::class)->group(function () {
  Route::get('register', 'create')->name('register.create');
  Route::post('register', 'store')->name('register.store');
});

Route::controller(SessionController::class)->group(function () {
  Route::get('login', 'create')->name('login.create')->middleware('guest');
  Route::post('login', 'store')->name('login.store')->middleware('guest');
  Route::post('logout', 'destroy')->name('logout')->middleware('auth');
});

Route::post('newsletter', NewsletterController::class)->name('newsletter');
Route::post('posts/{post}/comments', [PostCommentsController::class, 'store'])->name('posts.comments.store');