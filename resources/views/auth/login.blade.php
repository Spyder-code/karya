@extends('layouts.auth')
@section('content')
<div class="min-w-screen min-h-screen bg-white flex items-center justify-center px-5 py-5">
    <div class="bg-white text-gray-500 w-full" style="max-width:1000px">
        <div class="flex flex-col-reverse md:flex-row w-full">
            <div class="w-full md:w-2/5 py-1 md:py-5 px-10">
                <div class="py-8">
                    <h1 class="font-bold text-2xl text-gray-900">Sign In to FUNBAHASA</h1>
                    <p>Fun Bahasa #BahasaAdalahKita</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br>
                @endif

                <form action="{{ route('login') }}" method="POST" class="pb-20">
                    @csrf
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="email" name="email" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 mt-1">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-1">
                            <label for="" class="text-xs font-semibold px-1">Password</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" name="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500 mt-1">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3 mb-5">
                      <div class="w-1/2 px-3">
                        <label class="block text-gray-500 font-bold my-4">
                          <input type="checkbox" name="remember_me" class="leading-loose text-pink-600">
                          <span class="py-2 text-sm text-gray-600">Remember Me</span>
                        </label>
                      </div>
                      <div class="w-1/2 px-3 text-right">
                        <label class="block text-gray-500 font-bold my-4">
                          <a href="#" class="text-gray-600 hover:text-blue-600">
                            <span>Forgot Password?</span>
                          </a>
                        </label>
                      </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <button type="submit" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">SIGN IN</button>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                      <div class="w-full px-3 mb-3">
                        <p>Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
                      </div>
                    </div>
                    <div class="flex -mx-3">
                      <div class="w-full px-3 mb-5">
                        <p>Or Sign In with</p>
                      </div>
                    </div>
                    <div class="flex flex-row -mx-3">
                      <div class="px-3">
                        <a href="{{ route('login.facebook') }}">
                          <img src="{{ asset('images') }}/icon-facebook-color.png" class="shadow-md hover:shadow-lg transform hover:scale-105 motion-reduce:transform-none h-8 w-8 rounded-full" alt="">
                        </a>
                      </div>
                      <div class="px-3 mb-5">
                        <a href="{{ route('login.google') }}">
                          <img src="{{ asset('images') }}/icon-google-color.png" class="shadow-md hover:shadow-lg transform hover:scale-105 motion-reduce:transform-none h-8 w-8 rounded-full" alt="">
                        </a>
                      </div>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-3/5 bg-transparent py-1 md:py-5 px-5 md:px-10 text-center">
              <img src="{{ asset('images') }}/login.svg" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
</div>
@endsection
