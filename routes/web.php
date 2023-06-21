<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::get('/',[PostController::class , 'index'])->name('home');

Route::get('/posts/{post}', [PostController::class , 'show']);

