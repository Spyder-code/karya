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
        return view('user.index', compact('setting'));
    }

    public function event()
    {
        $data = Event::all();
        $active = Event::all()->take(3)->sortByDesc('created_at');
        return view('user.event',compact('data','active'));
    }

    public function read()
    {
        $data = PostCategory::join('posts','posts.id','=','post_categories.post_id')
                ->join('categories','categories.id','=','post_categories.category_id')
                ->select('posts.*','categories.name as kategori','post_categories.id as id_post')
                ->where('posts.status',5)
                ->paginate(1);
        return view('user.read',compact('data'));
    }

    public function readDetail($id)
    {
        $post = PostCategory::join('posts','posts.id','=','post_categories.post_id')
                ->join('categories','categories.id','=','post_categories.category_id')
                ->select('posts.*','categories.name as kategori')
                ->where('post_categories.id',$id)
                ->first();

        $a = PostCategory::select('post_categories.category_id')
            ->where('post_categories.id',$id)
            ->first();

        if($a->category_id == 3){
            return view('user.detailPost',compact('post'));
        } else if ($a->category_id == 2){
            return view('user.detailPostCerpen',compact('post'));
        } else {
            return view('user.detailPostPuisi',compact('post'));
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
        $data = PostCategory::join('posts','posts.id','=','post_categories.post_id')
                ->join('categories','categories.id','=','post_categories.category_id')
                ->select('posts.*','categories.name as kategori','post_categories.id as id_post')
                ->where('post_categories.category_id',1)
                ->get();

        return view('user.categoryPuisi',compact('data'));
    }

    public function categoryArtikel()
    {
        $data = PostCategory::join('posts','posts.id','=','post_categories.post_id')
                ->join('categories','categories.id','=','post_categories.category_id')
                ->select('posts.*','categories.name as kategori','post_categories.id as id_post')
                ->where('post_categories.category_id',3)
                ->get();

        return view('user.categoryArtikel',compact('data'));
    }

    public function categoryCerpen()
    {
        $data = PostCategory::join('posts','posts.id','=','post_categories.post_id')
                ->join('categories','categories.id','=','post_categories.category_id')
                ->select('posts.*','categories.name as kategori','post_categories.id as id_post')
                ->where('post_categories.category_id',2)
                ->get();

        return view('user.categoryCerpen',compact('data'));
    }
}
