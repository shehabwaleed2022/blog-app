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


Route::get('/', [PostController::class, 'index'])->name('home')->middleware('auth');

Route::get('posts/{post}', [PostController::class, 'show']);
Route::post('posts/{post}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter',NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->name('register')->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');