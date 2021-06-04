<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()&&Auth::user()->role==1) {
            return redirect()->route('admin.user');
        } elseif(Auth::check()&&Auth::user()->role==3) {
            return redirect()->route('funner.profile');
        } elseif(Auth::check()&&Auth::user()->role==2){
            return redirect()->route('juri.event');
        };
    }

    public function home()
    {
        $setting = Setting::find(1);
        $puisi = Post::all()->where('category',1)->sortByDesc('schedule')->take(3);
        $cerpen = Post::all()->where('category',2)->sortByDesc('schedule')->take(3);
        $artikel = Post::all()->where('category',3)->sortByDesc('schedule')->take(3);
        return view('user.index', compact('setting','cerpen','artikel','puisi'));
    }

    public function event()
    {
        $data = Event::all();
        $active = Event::all()->take(3)->sortByDesc('created_at');
        return view('user.event',compact('data','active'));
    }

    public function read()
    {
        $data = Post::where('posts.status',5)
                ->paginate(9);
        return view('user.read',compact('data'));
    }

    public function readDetail($id)
    {
        $sum = Post::all();
        $post = Post::find($id);
        $arrayId = array();

        foreach ($sum as $item ) {
            array_push($arrayId,$item->id);
        };

        $key = array_search($id, $arrayId);

        if (count($arrayId)==($key+1)){
            $next = null;
        } else {
            $ids = $arrayId[$key+1];
            $next = Post::find($ids);
        }

        if(0==$key){
            $prev = null;
        }else{
            $ids = $arrayId[$key-1];
            $prev = Post::find($ids);
        }

        if($post->category == 3){
            return view('user.detailPost',compact('post','next','prev'));
        } else if ($post->category == 2){
            return view('user.detailPostCerpen',compact('post','next','prev'));
        } else {
            return view('user.detailPostPuisi',compact('post','next','prev'));
        }

    }

    public function unggahKarya()
    {
        return view('user.unggahKarya');
    }

    public function tentangKami()
    {
        return view('user.tentangKami');
    }

    public function categoryPuisi()
    {
        $data = Post::where('category',1)->paginate(9);

        return view('user.categoryPuisi',compact('data'));
    }

    public function categoryArtikel()
    {
        $data = Post::where('category',3)->paginate(9);

        return view('user.categoryArtikel',compact('data'));
    }

    public function categoryCerpen()
    {
        $data = Post::where('category',2)->paginate(9);

        return view('user.categoryCerpen',compact('data'));
    }
}
