@extends('layouts.user')
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
        <div class="flex flex-row px-28 pb-20">
            <div class="relative w-8/12 flex flex-col my-auto">
                <div class="w-full">
                    <div class="bg-gradient-to-r from-blue-200 to-white w-full" style="font-family: 'Poppins', sans-serif;">
                        <!-- <div class="w-1/4"> -->
                            <h1 class="text-5xl md:text-7xl lg:text-8xl xl:text-9xl ml-32 md:ml-44 lg:ml-60 xl:ml-80 text-white" style="-webkit-text-stroke: 1px #25AAE3;">BACA</h1>
                            <h1 class="text-5xl md:text-7xl lg:text-8xl xl:text-9xl ml-32 md:ml-44 lg:ml-60 xl:ml-80 text-white" style="-webkit-text-stroke: 1px #25AAE3;">KARYA</h1>
                        <!-- </div> -->
                    </div>
                    <h1 class="absolute text-5xl md:text-7xl lg:text-8xl xl:text-9xl top-7 md:top-10 lg:top-12 xl:top-14 ml-10 md:ml-16 lg:ml-28 xl:ml-32" style="font-family: 'Poppins', sans-serif;">Funners</h1>
                </div>
                <div class="text-center mt-10" style="font-family: 'Quicksand', sans-serif;">
                    <button class="bg-blue-200 hover:bg-blue-300 text-black py-2 px-6 rounded-3xl">Di Bawah Ini</button>
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
        <div class="px-28 pb-16" style="font-family: 'Poppins', sans-serif;">
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
            {{-- <div class="pb-5">
                <ul class="flex justify-center">
                    <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                    </li>
                </ul>
            </div> --}}
        </div>
    </section>
@endsection
