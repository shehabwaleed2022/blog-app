<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
  //


  // The 7 restful actions :
  // index, show, create, store, edit , update, destroy

  public function store(Post $post)
  {

    // Validation
    request()->validate([
      'body' => ['required', 'min:3' , 'max:255'],
    ]);

    $post->comments()->create([
      'body' => request('body'),
      'user_id' => request()->user()->id
    ]);

    return redirect("/post/{$post->slug}")->with('success', 'Comment posted successfully. ');
  }
}