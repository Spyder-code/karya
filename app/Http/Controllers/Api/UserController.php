<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return new UserCollection(User::all());
    }

    public function show(User $user)
    {
        return new UserResource(User::findOrFail($user->id));
    }

    public function update(Request $request, User $user)
    {
        User::find($user->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'avatar' => $request->avatar,
            'gender' => $request->gender,
            'password' => $request->password,
        ]);
        return response('User updated', 200)
                ->header('Content-Type', 'text/plain');
    }

}
