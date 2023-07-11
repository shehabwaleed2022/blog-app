<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
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
    Route::get('post/{post:slug}', 'show')->name('posts.show');
    Route::get('post/{post:slug}/edit', 'edit')->name('post.edit')->middleware('auth');
    Route::patch('post/{post}', 'update')->name('post.update')->middleware('auth');
    Route::get('posts/create', 'create')->name('posts.create')->middleware('auth');
    Route::post('posts/create', 'store')->name('posts.create.store')->middleware('auth');
    Route::delete('post/{post}', 'destroy')->name('post.destroy')->middleware('auth');
});


Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->name('admin.index')->middleware('can:admin');
});

Route::resource('admin/users', AdminUsersController::class)->except('show', 'create')->middleware('can:admin');
Route::resource('admin/posts', AdminPostsController::class)->middleware('can:admin')->names([
    'create' => 'admin.posts.create',
    'store' => 'admin.posts.store'
])->except('show', 'create', 'store');
Route::resource('admin/categories', AdminCategoriesController::class)->middleware('can:admin');

Route::post('like/{post}', [LikeController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::controller(SessionController::class)->group(function () {
    Route::get('login', 'create')->name('login.create')->middleware('guest');
    Route::post('login', 'store')->name('login.store')->middleware('guest');
    Route::post('logout', 'destroy')->name('logout')->middleware('auth');
});

Route::controller(PostCommentsController::class)->group(function () {
    Route::post('posts/{post}/comments', 'store')->name('posts.comments.store');
});

Route::post('newsletter', NewsletterController::class)->name('newsletter');