<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;

;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    public function getCategory($id)
    {
        $data = PostCategory::all()->where('category_id',$id);
        return PostCategoryResource::collection($data);
    }

    public function getType($type)
    {
        $data = Post::all()->where('type',$type);
        return PostResource::collection($data);
    }

    public function getAuthor($author)
    {
        $user = User::where('name',$author)->first();
        if($user){
            $data = Post::all()->where('user_id',$user->id);
            return PostResource::collection($data);
        }else{
            return response('Author tidak ditemukan!',200)->header('Content-Type', 'text/plain');
        }
    }

}
