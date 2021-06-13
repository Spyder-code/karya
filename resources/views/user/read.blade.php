@extends('layouts.user')
@section('Tentang', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Unggah', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Event', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Baca', 'block mt-4 mr-10  font-semibold text-blue-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('content')
    <!--* Greeting  -->
    <section class="m-10 pt-16">
        <div style="font-family: 'Quicksand', sans-serif;">
            <div class="pb-5 min-h-full">
                <h4><a href="{{ route('beranda') }}">Home</a> > <a href="baca_karya.html" style="color: rgba(96, 165, 250, 100);">Baca Karya</a></h4>
            </div>
        </div>
    </section>
    <section>
        <div class="flex flex-row px-10 sm:px-28 md:px-28 lg:px-28 pb-10 sm:pb-20 md:pb-20 lg:pb-20">
            <div class="relative w-8/12 flex flex-col my-auto">
                <div class="w-full">
                    <div class="bg-gradient-to-r from-blue-200 to-white w-full" style="font-family: 'Poppins', sans-serif;">
                        <!-- <div class="w-1/4"> -->
                            <h1 class="text-3xl sm:text-5xl md:text-7xl lg:text-8xl xl:text-9xl ml-24 sm:ml-32 md:ml-44 lg:ml-60 xl:ml-80 text-white" style="-webkit-text-stroke: 1px #25AAE3;">BACA</h1>
                            <h1 class="text-3xl sm:text-5xl md:text-7xl lg:text-8xl xl:text-9xl ml-24 sm:ml-32 md:ml-44 lg:ml-60 xl:ml-80 text-white" style="-webkit-text-stroke: 1px #25AAE3;">KARYA</h1>
                        <!-- </div> -->
                    </div>
                    <h1 class="absolute text-3xl sm:text-5xl md:text-7xl lg:text-8xl xl:text-9xl top-4 sm:top-6 md:top-10 lg:top-12 xl:top-14 ml-10 md:ml-16 lg:ml-28 xl:ml-32" style="font-family: 'Poppins', sans-serif;">Funners</h1>
                </div>
                <div class="text-center mt-8 sm:mt-10" style="font-family: 'Quicksand', sans-serif;">
                    <button class="bg-blue-200 text-sm sm:text-base md:text-base lg:text-base hover:bg-blue-300 text-black py-2 px-6 rounded-3xl">Di Bawah Ini</button>
                </div>
            </div>
            <div class="w-4/12">
                <div class="w-full" >
                    <img class="" src="{{ asset('images') }}/Frame21.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="px-10 sm:px-20 md:px-28 lg:px-28 pb-5 sm:pb-16 md:pb-16 lg:pb-16" style="font-family: 'Poppins', sans-serif;">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8 pb-10" style="font-family: Poppins;">
                @foreach ($data as $item)
                <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl hover:border-blue-500">
                    <h5 class="text-sm" style="color: #FF33AB;">{{ $item->categoryPost->name }}</h5>
                    <a href="{{ route('user.baca-karya.detail',['id'=>$item->id]) }}" class="text-xl py-2 text-black hover:text-blue-500">{{ $item->title }}</a>
                    <div class="flex flex-row mb-2">
                        <img src="{{ asset('images') }}/icon-calendar.png" class="w-6 mr-2">
                        <h5 class="text-sm text-gray-300 my-auto">
                            FUNBAHASA / {{ date('d F Y', strtotime($item->schedule)) }}
                        </h5>
                    </div>
                    <p class="text-sm">{{ Str::limit($item->post_excerpt, 200) }}</p>
                </div>
                @endforeach
            </div>
            {{$data->links('vendor.pagination.custom')}}
        </div>
    </section>
@endsection
