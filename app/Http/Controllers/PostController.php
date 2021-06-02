<?php

namespace App\Http\Controllers;

use App\Models\EventPost;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

        /*
            status post
            0 = pending
            1 = reviewed
            2 = accepted
            3 = Pending to publish
            4 = published
            5 = scheduled
        */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'content' => 'required',
            'title' => 'required',
            'type' => 'required',
            'post_excerpt' => 'required',
            'kategori' =>'required'
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'status' => 1,
            'author' => $request->author,
            'title' => $request->title,
            'content' => $request->content,
            'post_excerpt' => $request->post_excerpt,
        ]);

        for ($i=0; $i < count($request->kategori); $i++) {
            PostCategory::create([
                'post_id' => $post->id,
                'category_id' => $request->kategori[$i],
            ]);
        }

        $eve = intval($request->event);
        if ($request->type=='1') {
            EventPost::create([
                'event_id' => $eve,
                'post_id' => $post->id
            ]);
        };

        return back()->with('success','Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'author' => 'required',
            'content' => 'required',
            'title' => 'required',
            'type' => 'required',
            'post_excerpt' => 'required',
        ]);

        Post::find($post->id)->update([
            'title' => $request->title,
            'type' => $request->type,
            'post_excerpt' => $request->post_excerpt,
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return back()->with('success','Post updated!');
    }

    public function updateStatus(Post $post, Request $request)
    {
        Post::find($post->id)->update([
            'status' => $request->status,
        ]);

        return back()->with('success','status changed!');
    }

    public function updateSchedule(Post $post, Request $request)
    {
        $tipe = $request->tipe;
        $now = date("Y-m-d H:i:s");
        if ($tipe=='0') {
            return back()->with('danger','Publish cant be null!');
        } elseif($tipe=='1') {
            Post::find($post->id)->update([
                'status' => 5,
                'schedule' => $now
            ]);
        } elseif($tipe=='2'){
            Post::find($post->id)->update([
                'status' => 4,
                'schedule' => $request->schedule
            ]);
        }
        
        return back()->with('success','Post publish has updated!');
    }

    public function updatePoint(Post $post, Request $request)
    {
        Post::find($post->id)->update([
            'point' => $request->point,
        ]);

        return back()->with('success','point changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return back()->with('success','Post deleted!');
    }
}
