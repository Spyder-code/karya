<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostCategoryResource extends JsonResource
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
            'post' => new PostResource(Post::find($this->post_id)),
            'category' => new CategoryResource(Category::find($this->category_id)),
        ];
    }
}
