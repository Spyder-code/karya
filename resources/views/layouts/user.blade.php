<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Fun Bahasa #BahasaAdalahKita</title>
    <link rel="shortcut icon" href="{{ asset('images/funbahasa.png')}}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    @yield('style')
</head>

<body class="antialiased bg-body text-body font-body">
    <!--* Container -->

    <div class="xl\:container mx-auto">
        <!--* Navigator Bar -->
        <header class="top-0 fixed z-50 flex flex-wrap items-center justify-between w-full p-4 px-8 4xl:h-12 3xl:w-full lg:justify-between bg-white">
        <div x-data="{open: false}"
            class="flex justify-between w-full navbar-menu lg:w-full 3xl:w-full xl:justify-between">
            <!--* Image  -->
            <div class="flex w-full sm:w-1/3 lg:block lg:w-2/5 md:w-1/3">
                <a href="{{ route('beranda') }}" class="">
                    <img src="{{ asset('images') }}/funbahasa-logo.svg" alt="funbahasa-logo" width="150" height="50px">
                </a>
            </div>
            <!--* Hamburger Menu -->
            <button @click="open = true"
                class="flex justify-center w-10 h-10 px-1 py-1 hover:bg-gray-300 md:hidden lg:hidden xl:hidden 2xl:hidden 3xl:hidden">
                <img src="{{ asset('images') }}/hamburger-menu.svg" alt="">
            </button>
            <!--* Image End  -->
            <!--* Nav Menu Item -->
            <div
                class="flex-row hidden flex-row w-full md:flex md:items-center md:w-full lg:flex lg:items-center lg:w-full lg:justify-end">
                <nav class="sm:justify-end sm:w-full sm:flex">
                    <a href="{{ route('user.tentang-kami') }}"
                        class="block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500" style="font-family: 'Poppins', sans-serif;">Tentang Kami</a>
                    <a href="{{ route('funner.tambah.karya') }}"
                        class="block mt-4 mr-10 font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500" style="font-family: 'Poppins', sans-serif;">Unggah Karya</a>
                    <a href="{{ route('user.event') }}"
                        class="block mt-4 mr-10 font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500" style="font-family: 'Poppins', sans-serif;">Event</a>
                    <a href="{{ route('user.baca-karya') }}"
                        class="block mt-4 mr-10 font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500" style="font-family: 'Poppins', sans-serif;">Baca Karya</a>
                    <a href="{{ route('login') }}"
                        class="px-5 py-1 ml-3 font-semibold text-white transition-all bg-blue-500 border-transparent rounded-full border-1 hover:border-blue-500 hover:shadow-lg hover:bg-blue-400" style="font-family: 'Quicksand', sans-serif;">
                        @if (Auth::check())
                            Dashboard
                        @else
                            Masuk
                        @endif
                    </a>
                </nav>
            </div>
            <!--* Nav Menu Item End -->
            <!--* Nav Menu Mobile -->
            <div x-show="open" @click.away="open = false"
                class="absolute z-10 max-w-md px-2 transform right-10 w-screen-md mt-7 sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="relative grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">
                        <a href="#" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                            <div class="ml-2">
                                <a href="tentang-kami.html" class="text-base font-medium text-gray-900" style="font-family: 'Poppins', sans-serif;">
                                    Tentang Kami
                                </a>
                            </div>
                        </a>

                        <a href="unggah-karya.html" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                            <div class="ml-2">
                                <a class="text-base font-medium text-gray-900" style="font-family: 'Poppins', sans-serif;">
                                    Unggah Karya
                                </a>
                            </div>
                        </a>

                        <a href="Event.html" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                            <div class="ml-2">
                                <a class="text-base font-medium text-gray-900" style="font-family: 'Poppins', sans-serif;">
                                    Event
                                </a>
                            </div>
                        </a>

                        <a href="baca_karya.html" class="flex items-start p-3 -m-3 rounded-lg hover:bg-gray-50">
                            <div class="ml-2">
                                <a class="text-base font-medium text-gray-900" style="font-family: 'Poppins', sans-serif;">
                                    Baca Karya
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    </div>
    <!--* Navigator Bar End -->

    <!--* Main Content -->
    <main>
        @yield('content')
    </main>
        <!--* Main Content End -->
    <!--* Footer  -->
    <footer class="relative pt-8 pb-6 bg-repeat-y bg-cover" style="background-image: url('{{ asset('images') }}/Footer.svg'); min-height: 550px;">
        <div class="container relative mx-auto px-4 -top-60 lg:-top-0">
            <div class="flex flex-wrap text-center lg:text-left">
                <div class="relative w-full lg:w-4/12 px-4 top-72 lg:top-64 xl:top-72">
                    <img class="ml-auto lg:ml-0 mr-auto lg:mr-0 w-56" src="{{ asset('images') }}/funbahasa-logo.svg" alt="funbahasa-logo">
                    <div class="mt-6 mb-6 lg:mb-0">
                        <h4 class="pb-2 text-3xl font-semibold" style="font-family: 'Quicksand', sans-serif;">Follow Us On</h4>
                        <div class="flex flex-row -mx-3 mt-2 justify-center lg:justify-start">
                            <div class="px-3">
                                <a href="#">
                                    <img src="{{ asset('images') }}/icon-facebook-color.png" class="shadow-md hover:shadow-lg transform hover:scale-105 motion-reduce:transform-none h-10 w-10 rounded-full" alt="">
                                </a>
                            </div>
                            <div class="px-3">
                                <a href="#">
                                    <img src="{{ asset('images') }}/icon-twitter-color.png" class="shadow-md hover:shadow-lg transform hover:scale-105 motion-reduce:transform-none h-10 w-10 rounded-full" alt="">
                                </a>
                            </div>
                            <div class="px-3">
                                <a href="#">
                                    <img src="{{ asset('images') }}/icon-instagram-color.png" class="shadow-md hover:shadow-lg transform hover:scale-105 motion-reduce:transform-none h-10 w-10 rounded-full" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative w-full lg:w-8/12 px-4 mt-80 lg:mt-0" style="top: 250px;">
                    <div class="flex flex-wrap items-top mb-6">
                        <div class="w-6/12 lg:w-3/12 px-4 ml-auto mb-10 lg:mb-0">
                            <span class="block uppercase text-gray-600 text-sm font-semibold mb-2" style="font-family: 'Poppins', sans-serif;">
                                Informasi Event
                            </span>
                            <ul class="list-unstyled" style="font-family: 'Quicksand', sans-serif;">
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="https://docs.google.com/forms/d/1UNFeThxEbZhBDhgAwElKQwOFFeiR3l6sIgEX7XZdC7k/viewform?edit_requested=true" target="_blank"> Pendaftaran </a> </li>
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="https://drive.google.com/file/d/1NEFjtB62GBKx_UFLPcpVL6NkB_9hVFrZ/view" target="_blank"> Panduan </a> </li>
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="https://drive.google.com/drive/u/0/mobile/folders/134pKQW6Hacxn8n53_NTKzhVpNI2Uo6mr?usp=sharing" target="_blank"> Poster </a> </li>
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="https://docs.google.com/forms/d/1tALZMATeYnv0GDc7FYPF4S2SxjUKRLdw_KJ4pUpxPtY/viewform?edit_requested=true" target="_blank"> Unggah </a> </li>
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="#"> Pengumuman</a> </li>
                            </ul>
                        </div>
                        <div class="w-6/12 lg:w-2/12 px-4 ml-auto mb-10 lg:mb-0">
                            <span class="block uppercase text-gray-600 text-sm font-semibold mb-2" style="font-family: 'Poppins', sans-serif;">
                                List Kategori
                            </span>
                            <ul class="list-unstyled" style="font-family: 'Quicksand', sans-serif;">
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="{{ route('user.category-puisi') }}"> Puisi </a> </li>
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="{{ route('user.category-cerpen') }}"> Cerpen </a> </li>
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="{{ route('user.category-artikel') }}"> Artikel </a> </li>
                            </ul>
                        </div>
                        <div class="w-full lg:w-4/12 px-4 ml-auto">
                            <span class="block uppercase text-gray-600 text-sm font-semibold mb-2" style="font-family: 'Poppins', sans-serif;">
                                CONTACT
                            </span>
                            <ul class="list-unstyled" style="font-family: 'Quicksand', sans-serif;">
                                <li> <p class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" > Ruko de Farda RK-5, Dusun Keboan, Keboananom, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254 </p> </li>
                                <li> <p class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" > funbahasa@gmail.com </p> </li>
                                <li> <a class="text-gray-700 hover:text-blue-500 font-semibold block pb-2 text-sm" href="www.funbahasa.com"> www.funbahasa.com </a> </li>
                                <li> <p class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" > +62 815-1531-2240 </p> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center md:justify-between justify-center text-center">
                <div class="relative w-full sm:w-1/2 md:w-4/12 px-4 mx-auto text-center top-64 lg:top-56 xl:top-64">
                    <div class="bg-black content-center w-full" style="height: 2px;"></div>
                    <div class="py-1 text-sm font-semibold text-gray-600" style="font-family: 'Quicksand', sans-serif;">
                        Fun Bahasa Indonesia ©
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--* Footer End  -->

    @yield('script')
</body>

</html>
