@extends('layouts.user')
@section('content')
<section class="m-10 pt-16" style="font-family: 'Quicksand', sans-serif;">
    <div class="pb-5 min-h-full">
        <h4><a href="{{ route('beranda') }}">Home</a> > <a href="{{ route('user.category-cerpen') }}" style="color: rgba(96, 165, 250, 100);">Cerpen</a></h4>
    </div>
</section>
<section>
<div class="flex flex-row px-28 w-full text-right " style="font-family: 'Poppins', sans-serif;">
    <div class="w-1/2">
        <h1 class="text-6xl md:text-7xl lg:text-8xl bg-clip-text text-transparent bg-gradient-to-b from-black to-white" >Categori</h1>
        <h1 class="text-6xl md:text-7xl lg:text-8xl text-green-300 ml-0 md:ml-4">Cerpen</h1>
    </div>
</div>
</section>
<section>
<div class="px-28">
    <div class="bg-contain bg-no-repeat" style="background-image: url({{ asset('images') }}/Group\ 7_green.svg);">
        <div class="relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-4 py-20" style="font-family: 'Poppins', sans-serif;">
            @foreach ($data as $item)
            <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl hover:border-blue-500">
                <h5 class="text-sm">{{ $item->categoryPost->name }}</h5>
                <a href="{{ route('user.baca-karya.detail',['id'=>$item->id]) }}" class="text-xl py-2 text-black hover:text-green-500">{{ $item->title }}</a>
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
</div>
@endsection
