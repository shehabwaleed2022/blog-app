<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
  return view('posts', [
    'posts' => $posts = Post::latest('published_at')->get(),
    'categories' => Category::all()
]);
});

// This called Route Model Binding ( Default laravel will search for the post with the id , you can change it by {post:slug} , or any thing else )
Route::get('/posts/{post}', function (Post $post) {
  return view('post', [
    'post' => $post,
  ]);
});

Route::get('/authors/{author:username}', function (User $author) {
  return view('posts', [
    'posts' => $author->posts,

  ]);

});


Route::get('/categories/{category:name}', function (Category $category) {
  return view('posts', [
    'posts' => $category->posts,
  ]);
});