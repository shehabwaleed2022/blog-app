<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'Content' => $this->body,
            'post' => new PostsResource($this->post),
            'Loves Number' => $this->loves_num,
            'User Id' => $this->user_id,
        ];
    }
}
