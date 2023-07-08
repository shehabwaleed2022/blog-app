<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostsController extends Controller
{
  //

  public function index()
  {
    return view('admin.posts.index', [
      'posts' => Post::latest()->paginate(10),
    ]);
  }

  public function edit(Post $post)
  {
    return view('admin.posts.edit', [
      'post' => $post,
      'categories' => Category::all()
    ]);
  }

  public function update(Post $post)
  {
    $attriutes = request()->validate([
      'title' => ['required', 'min:3', 'max:35'],
      'body' => ['required', 'min:3', 'max:255'],
      'category_id' => ['required', Rule::exists('categories', 'id')],
    ]);

    $attriutes['is_active'] = request('status') == 'active' ? 1 : 0;


    $post->update($attriutes);

    return redirect(route('posts.index'))->with('success', 'Post updated successfully .');
  }

  public function destroy(Post $post)
  {
    $post->delete();

    return redirect(route('posts.index'))->with('success', 'Post deleted successfully .');
  }
}