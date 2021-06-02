<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateProfile(Request $request, User $user)
    {
        User::find($user->id)->update($request->all());

        return back()->with('success','Update Success');
    }

    public function updateImage(Request $request, User $user)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($files = $request->file('image')) {
            $profileImage = Auth::id().'.'.$files->getClientOriginalExtension();
            $path = $files->storeAs('public/images/user', $profileImage);
            $url = Storage::url($path);
            $imgUrl = url($url);
            User::find($user->id)->update(['avatar'=>$imgUrl]);
            return back()->with('success','Update Success');
        }
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        User::find($user->id)->update(['password'=>Hash::make($request->password)]);
        return back()->with('success','Update Success');
    }
}
