<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::get();
        if ($posts)
            return ApiResponse::send(200, 'Posts returned successfully . ', PostsResource::collection($posts));
        else
            return ApiResponse::send(200, 'No posts found', null);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        $attributes = $request->validated();

        // $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->user()->id;
        $attributes['slug'] = Str::slug($attributes['title'] . ' ' . Str::uuid());
        $attributes['excerpt'] = substr($attributes['body'], 0, 15) . '...';
        $attributes['published_at'] = now();

        $record = Post::create($attributes);

        if($record){
            return ApiResponse::send(201, 'Post created successflly.', []);
        }else{
            return ApiResponse::send(200, 'Error', []);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
