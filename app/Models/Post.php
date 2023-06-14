<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // To solve (n+1) problem
  protected $with = ['author', 'category'];

  protected $guarded = ['id']; // This fields will not accept mass assignment
  // protected $fillable = ['title', 'body', 'excerpt'];  This fields will accept mass assignment

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class,'user_id');
  }
}