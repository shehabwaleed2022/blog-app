<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

  public static function find($slug)
  {
    if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
      throw new ModelNotFoundException();
    }

    $post = cache()->remember("posts.{$slug}", 5, fn() => file_get_contents($path));

    return $post;
  }

  public static function all()
  {
    return cache()->rememberForever('posts.all', function () {
      $files = File::files(resource_path("posts/"));

      $posts = array_map(function ($file) {
        return $file->getContents();
      }, $files);
      return $posts;
    });


  }

}