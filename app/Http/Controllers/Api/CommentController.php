<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $comments = Comment::where('post_id', request('post_id'))->get();

        if (count($comments) != 0) {
            return ApiResponse::send(200, 'Comments retrieved successfully .', CommentResource::collection($comments));
        } else {
            return ApiResponse::send(200, 'No comments found', null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
        $comment = Comment::find($id)->get();

        if (count($comment) > 0) {
            return ApiResponse::send(200, 'Comment retireved successfully .', CommentResource::collection($comment));
        } else {
            return ApiResponse::send(200, 'No comment found', []);
        }
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
