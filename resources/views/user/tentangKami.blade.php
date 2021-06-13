@extends('layouts.user')
@section('Tentang', 'block mt-4 mr-10  font-semibold text-blue-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Unggah', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Event', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Baca', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('content')

<div class="absolute top-0 -z-1 w-full">
    <img class="w-full" src="{{ asset('images') }}/About Us.svg" alt="Back-ground-header-img">
</div>
    <!--* Greeting  -->
    <section class="relative m-10 pt-16" style="font-family: 'Quicksand', sans-serif;">
        <div class="pb-5 min-h-full">
            <h4><a href="{{ route('beranda') }}">Home</a> > <a href="{{ route('beranda') }}" style="color: rgba(96, 165, 250, 100);">Tentang Kami</a></h4>
        </div>
    </section>

    <section class="relative w-full pb-10 sm:pb-20 md:pb-20 lg:pb-20">
        <div class="relative w-full pt-2 md:pt-8 lg:pt-8">
            <div class="flex flex-row">
                <div class="w-3/4 sm:w-6/12 md:w-6/12 lg:w-6/12 pl-8">
                    <h2 class="font-bold text-gray-500 text-2xl sm:text-4xl md:text-5xl lg:text-6xl" style="font-family: 'Quicksand', sans-serif;">
                        Tentang Kami
                    </h2>
                    <img class="pb-5 sm:pb-8 md:pb-8 lg:pb-8" src="{{ asset('images') }}/line.png">
                    <p class="text-sm sm:text-base md:text-lg lg:text-xl" style="font-family: 'Poppins', sans-serif;">
                        Funbahasa adalah platform media online edukasi berbasis komunitas yang memiliki visi mengakselerasi pemahaman tentang bahasa dan sastra kepada masyarakat luas dengan memberikan pengetahuan seputar bahasa dan sastra sekaligus mewadahi karya dan pikiran anak bangsa melalui event kebahasaan dan kesastraan yang diselenggarakan secara berkala.
                    </p>
                </div>
            </div>
            <div class="flex flex-row pt-12 sm:pt-24 md:pt-32 lg:pt-80">
                <div class="w-1/2">
                    <img src="{{ asset('images') }}/Frame 47.svg" class="w-full h-auto">
                </div>
                <div class="w-1/2 my-auto p-2 sm:p-10 md:p-10 lg:p-10">
                    <h5 class="font-bold text-gray-500 text-2xl sm:text-4xl md:text-5xl lg:text-6xl" style="font-family: 'Quicksand', sans-serif;">Visi Kami</h5>
                    <img class="pb-8" src="{{ asset('images') }}/line.png">
                    <p class="text-sm sm:text-base md:text-lg lg:text-xl" style="font-family: 'Poppins', sans-serif;">Mengakselerasi pengetahuan bahasa dan sastra untuk budi pekerti bangsa.</p>
                </div>
            </div>
        </div>

    </section>
    <!--* Greeting  End-->

    <!--* Post  -->
    <section>
        <div class="relative pb-5 sm:pb-20 md:pb-20 lg:pb-20">
            <div class="bg-no-repeat bg-right-top bg-contain pt-10 sm:pt-32 md:pt-32 lg:pt-32" style="background-image: url({{ asset('images/vector.svg') }});">
                <div class="flex flex-col w-full px-10">
                    <div class="w-auto pb-8">
                        <p class="font-bold text-gray-500 text-2xl sm:text-4xl md:text-5xl lg:text-6xl" style="font-family: 'Quicksand', sans-serif;">Misi Kami</p>
                        <img src="{{ asset('images') }}/line.png">
                    </div>
                    <div class="w-12/12 sm:w-10/12 md:w-10/12 lg:w-10/12">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                            <div class="border border-2 shadow-lg shadow-lg bg-white p-1 sm:p-5 md:p-5 lg:p-5 rounded-2xl text-center transform hover:scale-105 motion-reduce:transform-none hover:border-blue-500">
                                <div class="h-28 sm:h-40 md:h-48 lg:h-60">
                                    <img class="w-3/4 h-auto pb-5 mx-auto" src="{{ asset('images') }}/tentang_kami_1.svg">
                                </div>
                                <p class="font-medium text-xs sm:text-base md:text-lg lg:text-lg" style="font-family: 'Poppins', sans-serif;">Menjadikan media sosial sebagai platform utama dalam menyebarluaskan informasi mengenai bahasa dan kesastraan</p>
                            </div>
                            <div class="border border-2 shadow-lg shadow-lg bg-white p-1 sm:p-5 md:p-5 lg:p-5 rounded-2xl text-center transform hover:scale-105 motion-reduce:transform-none hover:border-blue-500">
                                <div class="h-28 sm:h-40 md:h-48 lg:h-60">
                                    <img class="w-3/4 h-auto pb-5 mx-auto pt-10 md:pt-16 lg:pt-16" src="{{ asset('images') }}/tentang_kami_2.svg">
                                </div>
                                <p class="font-medium text-xs sm:text-base md:text-lg lg:text-lg" style="font-family: 'Poppins', sans-serif;">Menyelenggarakan berbagai macam event  bahasa dan kesastraan dalam rangka mewadahi karya dan pikiran anak bangsa</p>
                            </div>
                            <div class="border border-2 shadow-lg shadow-lg bg-white p-1 sm:p-5 md:p-5 lg:p-5 rounded-2xl text-center transform hover:scale-105 motion-reduce:transform-none hover:border-blue-500">
                                <div class="h-28 sm:h-40 md:h-48 lg:h-60">
                                    <img class="w-3/4 h-auto pb-5 mx-auto pt-5 md:pt-10 lg:pt-10" src="{{ asset('images') }}/tentang_kami_3.svg">
                                </div>
                                <p class="font-medium text-xs sm:text-base md:text-lg lg:text-lg" style="font-family: 'Poppins', sans-serif;">Menyediakan layanan pelatihan keterampilan berbahasa dan kesastraan melalui media diskusi secara daring maupun luring</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--* Post End -->
@endsection
