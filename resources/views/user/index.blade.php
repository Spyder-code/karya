@extends('layouts.user')
@section('Tentang', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Unggah', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Event', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Baca', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('content')
    <!--* Greeting  -->
    <section class="relative w-full bg-clip-border h-30 pt-16" style="font-family: 'Quicksand', sans-serif;">
        <img src="{{ asset('images') }}/bg-greeting.svg" alt="image-greeting" class="w-full h-auto">
        <div class="absolute top-20 md:top-28 lg:top-28 ml-14 lg:ml-20">
            <div class="flex flex-col">
                <h2
                    class="text-xl font-bold text-gray-500 ease-in transform md:text-4xl xl:text-6xl xl:text-bold 2xl:text-5xl lg:text-5xl sm:text-3xl 4xl:text-7xl 3xl:text-5xl 4xl:font-extrabold">
                    Akselerasi Bahasa <br> dan Sastra untuk <br> Budi Pekerti <br>Bangsa</h2>
                <button
                    class="px-4 py-2 lg:py-3 mt-10 text-white transition duration-200 ease-in transform bg-blue-500 border border-blue-600 rounded-full shadow-md xl:mt-20 max-w-max hover:shadow-lg hover:-translate-y-1 active:translate-y-0 lg:mt-16 lg:font-bold">
                    Tentang Kami
                </button>
            </div>
        </div>
    </section>
    <!--* Greeting  End-->
    <!--* Call To Action  -->
    <section class="relative w-full mt-48 text-center">
        <div class="bg-contain">
            <img class="w-full" src="{{ asset('images') }}/call-to-action.svg" alt="image-reading">
        </div>
        <div class="flex flex-col absolute -top-32 w-full mx-auto" style="font-family: 'Poppins', sans-serif;">
            <h2
                class="content-center justify-center text-2xl font-bold text-center text-gray-500 xl:text-5xl md:text-4xl lg:font-bold xl:font-bold">
                Kirim Karya Terbaik Kalian</h2>
            <p class="mt-5 text-center text-sm md:text-lg">
                Setiap orang pasti punya pengalaman dan cerita. Pengalaman merupakan <br> sebuah perjalanan yang
                berharga, untuk itu kami hadir untuk <br> mendengarkan pengalaman dan cerita yang kalian
                bagikan. <br>
                Hidupkan karyamu sebagai inspirasi bangsa.
            </p>
            <button
                class="px-4 py-2 lg:py-3 mt-10 text-white transition duration-200 ease-in transform bg-gray-500 border border-gray-600 rounded-xl shadow-md xl:mt-16 max-w-max hover:shadow-lg hover:-translate-y-1 active:translate-y-0 lg:mt-16 lg:font-bold mx-auto" style="font-family: 'Quicksand', sans-serif;">
                Ikuti Kami
            </button>
        </div>
    </section>
    <!--* Call To Action End  -->
    <!--* Event  -->
    <section>
        <div class="flex flex-col md:flex-row lg:flex-row w-full p-4" style="background-image: url({{ asset('images') }}/vector_section_event.png); background-repeat: no-repeat;">
            <div class="w-full md:w-1/2 lg:w-1/2 bg-transparent">
                <div class="grid grid-cols-2 gap-4 p-4">
                    <a href="{{ $setting->link_registration }}" target="_blank">
                        <div class="border shadow-lg bg-white rounded-xl p-4 text-center transform hover:scale-105 hover:border-blue-500 motion-reduce:transform-none">
                            <img src="{{ asset('images') }}/Pendaftaran.svg" class="display block ml-auto mr-auto py-4 w-full">
                            <p class="font-bold" style="font-family: 'Quicksand', sans-serif;">Pendaftaran</p>
                        </div>
                    </a>
                    <a href="{{ $setting->link_guide }}" target="_blank">
                        <div class="border shadow-lg bg-white rounded-xl p-4 text-center transform hover:scale-105 hover:border-blue-500 motion-reduce:transform-none">
                            <img src="{{ asset('images') }}/Panduan.svg" class="display block ml-auto mr-auto py-4 w-full">
                            <p class="font-bold" style="font-family: 'Quicksand', sans-serif;">Panduan</p>
                        </div>
                    </a>
                    <a href="{{ $setting->link_poster }}" target="_blank">
                        <div class="border shadow-lg bg-white rounded-xl p-4 text-center transform hover:scale-105 hover:border-blue-500 motion-reduce:transform-none">
                            <img src="{{ asset('images') }}/poster.svg" class="display block ml-auto mr-auto py-4 w-full">
                            <p class="font-bold" style="font-family:  'Quicksand', sans-serif;">Poster</p>
                            <p style="font-family: 'Poppins', sans-serif;">Unduh Poster</p>
                        </div>
                    </a>
                    <a href="{{ $setting->link_upload_post }}" target="_blank">
                        <div class="border shadow-lg bg-white rounded-xl p-4 text-center transform hover:scale-105 hover:border-blue-500 motion-reduce:transform-none">
                            <img src="{{ asset('images') }}/Unggah.svg" class="display block ml-auto mr-auto py-4 w-full">
                            <p class="font-bold" style="font-family: 'Quicksand', sans-serif;">Unggah</p>
                            <p style="font-family: 'Poppins', sans-serif;">Unggah Puisi #FPPN2020</p>
                        </div>
                    </a>
                    <a href="{{ $setting->link_announcement }}">
                        <div class="border shadow-lg bg-white rounded-xl p-4 text-center transform hover:scale-105 hover:border-blue-500 motion-reduce:transform-none">
                            <img src="{{ asset('images') }}/Pengumuman.svg" class="display block ml-auto mr-auto py-4 w-full">
                            <p class="font-bold" style="font-family: 'Quicksand', sans-serif;">Pengumuman</p>
                            <p style="font-family: 'Poppins', sans-serif;">Pengumuman Juara #FPPN2020</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/2 bg-transparent pt-5">
                {!! $setting->event->instagram_embed !!}
            </div>
        </div>
    </section>
    <!--* Event End  -->
        <!--* What They Said  -->
    <section>
            <div class="w-full text-center">
                <p class="text-5xl" style="font-family: 'Quicksand', sans-serif;">Apa Kata Mereka</p>
            </div>
            <div class="inline-grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-4 p-8" style="font-family: 'Poppins', sans-serif;">
                <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl h-auto">
                    <p>Syukur tak habisnya kepada Tuhan Yesus karena telah memantaskan saya sebagai Juara 1 Lomba Kreasi Puisi Pendek Nasional 2020 yang diadakan oleh Fun Bahasa.</p>
                    <br>
                    <p>Juga teruntuk Dewan Juri dan Fun Bahasa, terima kasih banyak. Akhirnya “Melukis Wajah Ibu” menjadi karya pertama saya yang berhasil menjuarai Event Lomba Cipta Puisi Nasional.</p>
                    <br>
                    <p>Teman-teman yang sempat membaca ini, jangan menyerah untuk melangitkan mimpi yah. Makin tinggi gunung yang kita daki, makin indah pemandangannya. Ngomong-ngomong selagi masih #dirumahaja yuk sama-sama berkarya. Dan yang terpenting, jangan behenti menulis.</p>
                    <div class="flex pt-4 pb-2">
                        <div class="w-1/3 text-center">
                            <img src="{{ asset('images') }}/org-1.svg" class="display block ml-auto mr-auto py-4 rounded-full" style="width: 70%;">
                        </div>
                        <div class="w-2/3 my-auto">
                            <h2>Sevryade Anugrah Sambolangi</h2>
                            <h5>Author</h5>
                        </div>
                    </div>
                </div>
                <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl">
                    <p>Sangat bersyukur udah dipertemukan sama funbahasa yang membuka peluang besar buat orang-orang yang mengukir mimpinya di bidang linguistik. Ini kali pertama aku ikut event menulis kutipan di funbahasa ini dan gak pernah nyangka bisa jadi juara utama.⁣⁣⁣</p>
                    <br>
                    <p>Mencoba hal baru itu keren. Yang penting pengalaman, bukan gelar juaranya. Jadi harus tetap semangat memperbarui dan meningkatkan skill. Harus semangat berkarya.</p>
                    <div class="flex pt-4 pb-2">
                        <div class="w-1/3 text-center">
                            <img src="{{ asset('images') }}/org-1.svg" class="display block ml-auto mr-auto py-4 rounded-full" style="width: 70%;">
                        </div>
                        <div class="w-2/3 my-auto">
                            <h2>Indira Gayatri Dian Pramesti</h2>
                            <h5>Author</h5>
                        </div>
                    </div>
                </div>
                <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl">
                    <p>Bagi saya, cerita dan dongeng bukan hanya sekadar pengantar tidur, namun juga sebagai pembentuk karakter bagi anak. Saya yang sekarang, sebagiannya adalah dari pelajaran dalam dongeng-dongeng ibu saya sewaktu kecil dulu. Lomba ini merupakan wujud dari perhatian kita terhadap anak-anak yang saat ini sudah mulai kehilangan masa-masa kecilnya. Cerita untuk anak-anak harus kita kembangkan, tidak hanya untuk menunjang literasi, namun juga membangun karakter luhur anak negeri.</p>
                    <br>
                    <p>Terimakasih Fun Bahasa telah menghadirkan lomba yang sangat bermanfaat ini. Semoga dengan sumbangsih kecil kita, dapat berarti banyak untuk kemajuan anak bangsa.</p>
                    <div class="flex pt-4 pb-2">
                        <div class="w-1/3 text-center">
                            <img src="{{ asset('images') }}/org-1.svg" class="display block ml-auto mr-auto py-4 rounded-full" style="width: 70%;">
                        </div>
                        <div class="w-2/3 my-auto">
                            <h2>Nisa Fauztina</h2>
                            <h5>Author</h5>
                        </div>
                    </div>
                </div>
            </div>
    </section>
        <!--* What They Said End  -->
        <!--* Post  -->
    <section class="bg-gradient-to-b from-blue-100" style="font-family: 'Poppins', sans-serif;">
        <div class="w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-10 pb-10 px-10">
                @foreach ($puisi as $item)
                <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl hover:border-blue-500">
                    <h5 class="text-sm" style="color: #FF33AB;">Puisi</h5>
                    <a href="{{ route('user.baca-karya.detail',['id'=>$item->id]) }}" class="text-xl py-2 text-black hover:text-blue-500">{{ $item->title }}</a>
                    <div class="flex flex-row mb-2">
                        <img src="{{ asset('images') }}/icon-calendar.png" class="w-6 mr-2">
                        <h5 class="text-sm text-gray-300 my-auto">
                            FUNBAHASA / {{ date('d F y', strtotime($item->schedule)) }}
                        </h5>
                    </div>
                    <p class="text-sm">{{ Str::limit($item->post_excerpt, 200) }}</p>
                </div>
                @endforeach
            </div>
            <div class="pb-5">
                <ul class="flex justify-center">
                    <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                        <a class="flex items-center font-bold" href="{{ route('user.category-puisi') }}">
                            <span class="mx-3">View More</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-10 pb-10 px-10">
                @foreach ($cerpen as $item)
                <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl hover:border-blue-500">
                    <h5 class="text-sm" style="color: #FF33AB;">Cerpen</h5>
                    <a href="{{ route('user.baca-karya.detail',['id'=>$item->id]) }}" class="text-xl py-2 text-black hover:text-blue-500">{{ $item->title }}</a>
                    <div class="flex flex-row mb-2">
                        <img src="{{ asset('images') }}/icon-calendar.png" class="w-6 mr-2">
                        <h5 class="text-sm text-gray-300 my-auto">
                            FUNBAHASA / {{ date('d F y', strtotime($item->schedule)) }}
                        </h5>
                    </div>
                    <p class="text-sm">{{ Str::limit($item->post_excerpt, 200) }}</p>
                </div>
                @endforeach
            </div>
            <div class="pb-5">
                <ul class="flex justify-center">
                    <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                        <a class="flex items-center font-bold" href="{{ route('user.category-cerpen') }}">
                            <span class="mx-3">View More</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-10 pb-10 px-10">
                @foreach ($artikel as $item)
                <div class="border border-2 shadow-lg shadow-lg bg-white p-5 rounded-2xl hover:border-blue-500">
                    <h5 class="text-sm" style="color: #FF33AB;">Artikel</h5>
                    <a href="{{ route('user.baca-karya.detail',['id'=>$item->id]) }}" class="text-xl py-2 text-black hover:text-blue-500">{{ $item->title }}</a>
                    <div class="flex flex-row mb-2">
                        <img src="{{ asset('images') }}/icon-calendar.png" class="w-6 mr-2">
                        <h5 class="text-sm text-gray-300 my-auto">
                            FUNBAHASA / {{ date('d F y', strtotime($item->schedule)) }}
                        </h5>
                    </div>
                    <p class="text-sm">{{ Str::limit($item->post_excerpt, 200) }}</p>
                </div>
                @endforeach
            </div>
            <div class="pb-10">
                <ul class="flex justify-center">
                    <li class="mx-3 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white rounded-lg">
                        <a class="flex items-center font-bold" href="{{ route('user.category-artikel') }}">
                            <span class="mx-3">View More</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
        <!--* Post End -->
@endsection

