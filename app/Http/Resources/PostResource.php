<?php

namespace App\Http\Resources;

use App\Models\PostStatus;
use App\Models\PostType;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource(User::find($this->user_id)),
            'author' => $this->author,
            'title' => $this->title,
            'type' => new PostTypeResource(PostType::find($this->type)),
            'content' => $this->content,
            'post_excerpt' => $this->post_excerpt,
            'schedule' => $this->schedule,
            'status' => new PostStatusResource(PostStatus::find($this->status)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
