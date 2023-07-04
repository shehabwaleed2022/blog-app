<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Str;

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
      'comments' => Comment::latest()->where('post_id', 'like', $post->id)->simplePaginate(5),
    ]);
  }

  public function create()
  {
    return view('posts.create', [
      'pageTitle' => 'Create Post',
      'categories' => Category::all()
    ]);
  }

  public function store()
  {
    // Validate the request
    $attributes = request()->validate([
      'title' => ['required', 'min:3', 'max:35'],
      'body' => ['required', 'min:3', 'max:255'],
      'category_id' => ['required', Rule::exists('categories', 'id')],
      'thumbnail' => ['required', 'image']
    ]);

    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    $attributes['user_id'] = auth()->user()->id;
    $attributes['slug'] = Str::slug($attributes['title'] . ' ' . Str::uuid());
    $attributes['excerpt'] = substr($attributes['body'], 0, 15) . '...';
    $attributes['published_at'] = now();

    Post::create($attributes);

    return redirect(route('home'))->with('success', 'Post created successfully. ');
  }

  public function edit(Post $post)
  {
    // Check that the user has the premission to edit
    if ($post->user_id !== auth()->user()->id)
      abort(403);

    return view('posts.edit', [
      'pageTitle' => 'Edit a post',
      'post' => $post,
      'categories' => Category::all()
    ]);
  }

  public function update(Post $post)
  {
    // Validate the data
    $attribures = request()->validate([
      'title' => ['required', 'min:3', 'max:35'],
      'body' => ['required', 'min:3', 'max:255'],
      'category_id' => ['required', Rule::exists('categories', 'id')],
      'thumbnail' => ['image']
    ]);

    if (isset($attribures['thumbnail']))
      $attribures['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

    $post->update($attribures);

    return redirect("/post/{$post->slug}")->with('success', 'Post updated successfully. ');
  }

  public function destroy(Post $post)
  {
    $post->delete();
    return redirect(route('home'))->with('success', 'Post deleted successfully. ');
  }

}