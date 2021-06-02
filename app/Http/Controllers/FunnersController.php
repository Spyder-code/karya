<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FunnersController extends Controller
{

    public function index()
    {
        return redirect()->route('funner.post');
    }

    public function profile()
    {
        return view('profile');
    }

    public function createPost()
    {
        $event = Event::all();
        $category = Category::all();
        $type = PostType::all();
        return view('admin.karyaCreate', compact('category','type','event'));
    }

    public function post()
    {
        $data = Post::all()->where('user_id',Auth::id());
        return view('funner.post', compact('data'));
    }

    public function postEdit(Post $post)
    {
        $type = PostType::all();
        $category = Category::all();
        return view('admin.karyaEdit',compact('post','type','category'));
    }
}
