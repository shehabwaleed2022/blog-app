<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
  //
  public function index()
  {
    return view('posts.index', [
      'pageTitle' => 'Home',
      'posts' => Post::latest()
      ->filter(request(['search', 'category', 'author']))
      ->paginate(5)->withQueryString()
    ]);
  }

  public function show(Post $post)
  {
    return view('posts.show', [
      'pageTitle' => 'Post',
      'post' => $post,
      'comments' => Comment::latest()->where('post_id' , 'like' , $post->id)->simplePaginate(5),
    ]);
  }

  // public function showPostsByAuthorUsername(User $author)
  // {
  //   return view('posts', [
  //     'posts' => $author->posts,
  //   ]);
  // }

}