@extends('layouts.user')
@section('Tentang', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Unggah', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Event', 'block mt-4 mr-10  font-semibold text-blue-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Baca', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .swiper-button-next::after,
        .swiper-button-prev::after{
            content:''
        }
        .swiper-button-next{
            right: -3.5rem;
            top: 5rem;
        }

        .swiper-button-prev{
            top: 5rem;
            left: -3.5rem;
        }
    </style>
@endsection
@section('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            });
    </script>
@endsection

@section('content')
<div class="absolute top-0 -z-1 w-1\/2 right-5">
    <img src="{{ asset('images') }}/bg-header-event.svg" alt="Back-ground-header-img">
</div>
<section class="m-10 pt-16" style="font-family: 'Quicksand', sans-serif;">
    <div class="min-h-full">
        <h4><a href="{{ route('beranda') }}">Home</a> > <a href="Event.html" style="color: rgba(96, 165, 250, 100);">Event</a></h4>
    </div>
</section>
<!--* Greeting  -->
<section class="flex flex-col w-full text-center pb-28">
    <!-- component -->
    <!-- Display Container (not part of component) START -->

        <div class="text-center text-5xl md:text-7xl lg:text-8xl pb-7" style="font-family: 'Poppins', sans-serif;">
            <p>Event</p>
        </div>
        <!-- Carousel Body -->
        <div class="mx-4 sm:mx-auto md:mx-auto lg:mx-auto relative h-full w-4/4 sm:w-6/12 md:w-6/12 lg:w-4/12 min-h-screen rounded-lg block items-center">
            <div class="relative sm:static md:static lg:static w-full h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg shadow shadow-lg hover:shadow-2xl">
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($active as $item)
                            <div class="swiper-slide">
                                {!! $item->instagram_embed !!}
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-prev">
                    <button class="absolute top-0 mt-64 left-0 bg-white rounded-full shadow-md h-12 w-12 text-2xl text-indigo-600 hover:text-indigo-400 focus:text-indigo-400 ml-16 sm:-ml-8 md:-ml-8 lg:-ml-8 focus:outline-none focus:shadow-outline">
                        <span class="block" style="transform: scale(-1);">&#x279c;</span>
                    </button>
                </div>
                <div class="swiper-button-next">
                    <button class="absolute top-0 mt-64 right-0 bg-white rounded-full shadow-md h-12 w-12 text-2xl text-indigo-600 hover:text-indigo-400 focus:text-indigo-400 mr-16 sm:-mr-8 md:-mr-8 lg:-mr-8 focus:outline-none focus:shadow-outline">
                        <span class="block" style="transform: scale(1);">&#x279c;</span>
                    </button>
                </div>
            </div>

        </div>

    <!-- Display Container (not part of component) END -->
</section>

<section class="px-4 sm:px-12 md:px-10 lg:px-10 p-10" style="background-image: url({{ asset('images') }}/vector_event.png); background-repeat: no-repeat; background-size: contain;">
    <div class="text-4xl sm:text-5xl md:text-7xl lg:text-7xl pb-7" style="font-family: 'Quicksand', sans-serif;">
        <p>Lastest Event</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-12 pb-10" style="font-family: 'Poppins', sans-serif;">
        @foreach ($data as $item)
        <div class="text-center transform bg-blue-200 shadow md:shadow-lg group hover:shadow-2xl hover:bg-blue-400 hover:scale-105 motion-reduce:transform-none" style="border-radius: 25px;">
            {{-- <div class="text-center bg-blue-200 " style="border-radius: 25px; position: relative; ">
                <img
                    src="{{ asset('images') }}/poster.jpeg" class="w-full"
                    style="border-top-right-radius: 25px; border-top-left-radius: 25px;"
                >
            </div> --}}
            <div class="pb-6 text-center bg-white" style="border-bottom-right-radius: 25px; border-bottom-left-radius: 25px; z-index: -1;">
                {!! $item->instagram_embed !!}
            </div>
            <div class="flex justify-center py-1.5">
                <a class="flex items-center justify-center w-6 h-6 mx-2 py-4 transform hover:scale-105 motion-reduce:transform-none" href="#"><img src="{{ asset('images') }}/icon-facebook-black.png"></a>
                <a class="flex items-center justify-center w-6 h-6 mx-2 py-4 transform hover:scale-105 motion-reduce:transform-none" href="#"><img src="{{ asset('images') }}/icon-twitter-black.png"></a>
                <a class="flex items-center justify-center w-6 h-6 mx-2 py-4 transform hover:scale-105 motion-reduce:transform-none" href="#"><img src="{{ asset('images') }}/icon-instagram-black.png"></a>
                <a class="flex items-center justify-center w-6 h-6 mx-2 py-4 transform hover:scale-105 motion-reduce:transform-none" href="#"><img src="{{ asset('images') }}/icon-upload.png"></a>
            </div>
        </div>
        @endforeach
    </div>
    {{$data->links('vendor.pagination.custom')}}
    {{-- <div class="pb-10" style="font-family: 'Poppins', sans-serif;">
        <ul class="flex justify-center">
            <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                <a class="font-bold" href="#">1</a>
            </li>
            <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                <a class="font-bold" href="#">2</a>
            </li>
            <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                <a class="font-bold" href="#">3</a>
            </li>
            <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                <a class="flex items-center font-bold" href="#">
                    <span class="mx-3">Next</span>
                </a>
            </li>
        </ul>
    </div> --}}
</section>
<!--* Post End -->
@endsection


