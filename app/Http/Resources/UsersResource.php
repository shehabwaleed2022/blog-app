<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'First name' => $this->first_name,
            'Last name' => $this->last_name,
            'Username' => $this->username,
            'Photo path' =>$this->photo,
            'Is active' => $this->is_active,
            'Email' => $this->email,
        ];
    }
}
