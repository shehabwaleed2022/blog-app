<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function __invoke(Post $post)
    {
        // if the user allready like the post
        $currentUser = auth()->user();

        if ($post->likes()->where('user_id', $currentUser->id)->exists()) {
            $post->likes()->where('user_id', $currentUser->id)->delete();
            $post->decrement('likes_num');
            return redirect()->back()->with('success', 'Post unliked successfully.');
        }
        // if the user does not like the post
        $post->increment('likes_num');
        Like::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('success', 'Post liked successfully.');
    }

}
