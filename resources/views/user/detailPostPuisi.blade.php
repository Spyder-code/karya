@extends('layouts.user')
@section('Tentang', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Unggah', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Event', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Baca', 'block mt-4 mr-10  font-semibold text-blue-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('content')
    <!--* Greeting  -->
    <section class="m-10 pt-16">
        <div class="pb-5 min-h-full" style="font-family: 'Quicksand', sans-serif;">
            <h4><a href="{{ route('beranda') }}">Home</a> > <a href="{{ route('user.category-artikel') }}">{{ $post->categoryPost->name }}</a> > <a href="#" style="color: rgba(96, 165, 250, 100);">{{ $post->title }}</a></h4>
        </div>
        <a href="#" class="inline-block text-sm px-6 sm:px-10 md:px-10 lg:px-10 py-4 sm:py-5 md:py-5 lg:py-5 leading-none bg-blue-400 text-black rounded-2xl hover:shadow-lg hover:text-teal mt-4 lg:mt-0 transform hover:scale-105 motion-reduce:transform-none" style="font-family: 'Quicksand', sans-serif;">{{ $post->categoryPost->name }}</a>
        <!-- component -->
        <!-- This is an example component -->

        <div class="relative right-1">
            <input type="text" class="absolute bg-white right-0 border border-blue-200 py-2 px-4 outline-none w-28 sm:w-64 md:w-72 lg:w-4/12" placeholder="Search">
            <div class="absolute right-2 px-5 py-5">
                <button class="flex items-center border whitespace-no-wrap text-sm text-gray-600 bg-gray-200">
                    <svg class="h-4 sm:h-5 md:h-5 lg:h-5 w-4 sm:w-5 md:w-5 lg:w-5 absolute" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex flex-row w-full">
            <div class="w-3/4">
                <h3 class="pt-16 pb-5 text-lg sm:text-2xl md:text-2xl lg:text-2xl font-normal" style="font-family: 'Quicksand', sans-serif;">{{ date('F d, Y', strtotime($post->schedule)) }}</h3>
                <h1 class="pb-10 text-2xl sm:text-4xl md:text-4xl lg:text-4xl font-bold" style="font-family: 'Quicksand', sans-serif;">
                    {{ $post->title }}
                </h1>
            </div>
            <div class="relative w-1/4 right-0" style="top: 20px;">
                <img class="h-20 sm:h-40 md:h-48 lg:h-64" src="{{ asset('images') }}/Books.png">
            </div>
        </div>
        <div class="relative px-0 md:px-12 lg:px-32">
            <div class="rounded-3xl p-4 sm:p-10 md:p-15 lg:p-20 bg-blue-200">
                <div class="rounded-3xl py-5 px-4 sm:px-10 md:px-10 lg:px-10 bg-white" style="font-family: 'Quicksand', sans-serif;">
                    <h1 class="text-xl sm:text-3xl md:text-3xl lg:text-3xl mb-2">
                        {{ $post->title }}
                    </h1>
                    <br>
                    <h3 class="text-gray-400 text-sm sm:text-lg md:text-lg lg:text-lg">
                        By : {{ $post->author }}
                    </h3>
                    <br>
                    <div class="text-sm sm:text-lg md:text-lg lg:text-lg" style="font-family: 'Times New Roman', Times, serif;">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
            <div class="flex flex-row pt-14 justify-between" style="font-family: 'Poppins', sans-serif;">
                <div class="w-1/2 text-left">
                    @if ($prev!==null)
                    <a class="flex-auto text-xs sm:text-base md:text-base lg:text-base text-black hover:text-blue-500" href="{{ route('user.baca-karya.detail',['id'=>$prev->id]) }}">
                        <p class="pb-2">PREVIOUS POST</p>
                        <p>{{ $prev->title }}</p>
                    </a>
                    @endif
                </div>
                <div class="w-1/2 text-right">
                    @if ($next!=null)
                    <a class="flex-auto text-xs sm:text-base md:text-base lg:text-base text-black hover:text-blue-500" href="{{ route('user.baca-karya.detail',['id'=>$next->id]) }}">
                        <p class="pb-2">NEXT POST</p>
                        <p>{{ $next->title }}</p>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
