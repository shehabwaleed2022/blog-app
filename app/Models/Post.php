<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
  use HasFactory;

  // To solve (n+1) problem
  protected $with = ['author', 'category','comments'];

  protected $guarded = ['id']; // This fields will not accept mass assignment
  // protected $fillable = ['title', 'body', 'excerpt'];  This fields will accept mass assignment

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function scopeFilter($query, array $filters)
  { // Post::query()->filter([ ])

    $query->when($filters['search'] ?? false, function ($query, $search) {
      $query->where(fn($query) =>
        $query->where('title', 'like', '%' . $search . '%')
          ->orWhere('body', 'like', '%' . $search . '%'));
    });

    $query->when($filters['category'] ?? false, function ($query, $category) {
      $query->whereHas('category', fn($query) => $query->where('name', $category));
    });

    $query->when($filters['author'] ?? false, function ($query, $author) {
      $query->whereHas('author', fn($query) => $query->where('username', $author));
    });

  }


  public function comments(){
    return $this->hasMany(Comment::class);
  }
}