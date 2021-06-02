<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPost;
use App\Models\EventUser;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JuriController extends Controller
{
    public function index()
    {
        return redirect()->route('juri.event');
    }

    public function event()
    {
        $event = EventUser::all()->where('users_id', Auth::id());
        $postCount = array();
        $postCountEvent = array();
        $percent = array();
        foreach ($event as $item ) {
            $totalPostEvent = EventPost::all()->where('event_id',$item->event_id)->count();
            $post = DB::table('event_posts')
                ->join('posts','posts.id','=','event_posts.post_id')
                ->where('event_posts.event_id',$item->event_id)
                ->where('posts.point','>',0)
                ->count();
            array_push($postCount,$post);
            array_push($postCountEvent,$totalPostEvent);
        }
        for ($i=0; $i < count($postCount); $i++) {
            if ($postCount[$i] == 0 && $postCountEvent[$i] == 0) {
                array_push($percent,0);
            }else{
                $value = $postCount[$i]/$postCountEvent[$i] * 100;
                array_push($percent,$value);
            }
        }
        return view('Juri.event',compact('event','postCount','postCountEvent','percent'));
    }

    public function eventShow(Event $event)
    {
        $data = DB::table('event_posts')
                ->join('posts','posts.id','=','event_posts.post_id')
                ->where('event_posts.event_id',$event->id)
                ->select('posts.*')
                ->get();
        return view('juri.karya',compact('data'));
    }

    public function profile()
    {
        return view('profile');
    }
}
