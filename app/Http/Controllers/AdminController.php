<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use App\Models\PostStatus;
use App\Models\PostType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $postCount = Post::all()->count();
        $userCount = User::all()->where('role',3)->count();
        $eventCount = Post::all()->where('type',1)->count();
        $publicCount = Post::all()->where('type',2)->count();
        $users = User::select('id', 'created_at')
        ->where('role',3)
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

        $posts = Post::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

        $postmcount = [];
        $usermcount = [];
        $userArr = array();
        $postArr = array();

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }
        foreach ($posts as $key => $value) {
            $postmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                array_push($userArr,$usermcount[$i]);
            }else{
                array_push($userArr,0);
            }
            if(!empty($postmcount[$i])){
                array_push($postArr,$postmcount[$i]);
            }else{
                array_push($postArr,0);
            }
        }

        return view('admin.main',compact('userArr','postArr','postCount','userCount','eventCount','publicCount'));
    }

    public function user()
    {
        $data = User::all()->where('role',3);
        return view('admin.user',compact('data'));
    }

    public function userDestroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('success','User deleted!');
    }

    public function karya()
    {
        $umum = Post::all()->where('type',2)->sortByDesc('created_at');
        $event = Post::all()->where('type',1)->sortByDesc('created_at');
        $status = PostStatus::all();
        return view('admin.karya',compact('umum','status','event'));
    }

    public function karyaCreate()
    {
        $category = Category::all();
        $type = PostType::all();
        $event = Event::all();
        return view('admin.karyaCreate', compact('category','type','event'));
    }

    public function event()
    {
        $data = User::all()->where('role',2);
        $event = Event::all();
        return view('admin.juri',compact('data','event'));
    }

    public function juriStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 2;
            $user->save();
            return back()->with('success','User created!');
    }

    public function profile()
    {
        return view('profile');
    }
}
