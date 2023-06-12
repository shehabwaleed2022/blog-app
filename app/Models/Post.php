<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $guarded = ['id']; // This fields will not accept mass assignment
  // protected $fillable = ['title', 'body', 'excerpt'];  This fields will accept mass assignment

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}