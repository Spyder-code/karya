@extends('layouts.user')
@section('content')
    <!--* Greeting  -->
    <section class="m-10 pt-16" style="font-family: 'Quicksand', sans-serif;">
        <div class="pb-5 min-h-full" style="font-family: 'Quicksand', sans-serif;">
            <h4><a href="index.html">Home</a> > <a href="unggah-karya.html" style="color: rgba(96, 165, 250, 100);">Unggah Karya</a></h4>
        </div>
        <div class="w-full">
            <div class="px-10">
                    <h1 class="flex justify-start text-4xl py-2 mb-1"
                    style="font-family: Quicksand; font-size: 36px; font-style: normal; font-weight: normal; line-height: 110%;">Publish Karyamu</h1><hr class="mb-10 lg:mb-20" style="border: 1px solid #728196;">
            </div>
            <div class="flex flex-col-reverse lg:flex-row -mx-2 px-10">
                    <div class="w-full lg:w-1/2 mx-2">
                        <form action="" style="font-family: Quicksand; font-size: 24px; font-style: normal; font-weight: 500; line-height: 110%;">
                            <div class="mb-5">
                                <label class="capitalize text-black block mb-2" for="Name"> Nama Lengkap
                                </label>
                                <input class="w-full bg-white text-black border border-blue-200 rounded-3xl outline-none py-3 px-4" id="Name" type="text">
                            </div>
                            <div class="mb-5">
                                <label class="capitalize text-black block mb-2" for="Email"> Alamat Email
                                </label>
                                <input class="w-full bg-white text-black border border-blue-200 rounded-3xl outline-none py-3 px-4" id="Email" type="text">
                            </div>
                            <div class="mb-5">
                                <label class="capitalize text-black block mb-2" for="Nomor"> Nomor Whatsapp</label>
                                <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                    <div class="flex -mr-px">
                                        <span class="flex items-center border border-blue-200 px-3 whitespace-no-wrap text-sm text-gray-600 bg-gray-200">+62</span>
                                    </div>
                                    <input type="text" class="w-px flex-1 border border-blue-200 py-3 px-4 outline-none">
                                </div>
                            </div>
                            <!-- component -->

                            <div class="mb-5">
                                <label class="capitalize text-black block mb-2" for="Karya"> Jenis Karya
                                </label>
                                <input class="w-full bg-white text-black border border-blue-200 rounded-3xl outline-none py-3 px-4" id="Karya" type="text">
                            </div>
                            <div class="mb-5">
                                <label class="capitalize text-black block mb-2" for="Judul"> Judul Karya
                                </label>
                                <input class="w-full bg-white text-black border border-blue-200 rounded-3xl outline-none py-3 px-4" id="Judul" type="text">
                            </div>
                            <div class="mb-5">
                                <label class="capitalize text-black block mb-2" for="Judul">Upload Full Naskah</label>
                                <div class="custom-file">
                                    <h5 class="text-gray-400 pb-2">File Naskah</h5>
                                    <label class="custom-file-label" for="file"></label>
                                    <input type="file" class="custom-file-input" id="file">
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="capitalize text-black block mb-2" for="Judul">Gambar / Illustrasi</label>
                                <div class="custom-file">
                                    <h5 class="text-gray-400 pb-2">Gambar / Illustrasi</h5>
                                    <label class="custom-file-label" for="file"></label>
                                    <input type="file" class="custom-file-input" id="file">
                                </div>
                            </div>
                            <a href="#" class="inline-block text-sm py-2 px-4 leading-none bg-blue-500 text-white hover:shadow-lg hover:text-teal mt-4 lg:mt-0 transform hover:scale-105 motion-reduce:transform-none" style="font-family: 'Quicksand', sans-serif; font-size: 24px;">Unggah</a>
                        </form>
                    </div>
                    <div class="w-full lg:w-1/2 mx-2 lg:mx-8 mb-5" style="font-family: Quicksand; font-style: normal; font-size: 18px; line-height: 22px; font-weight: 500px;">
                        <h3 class="mb-5">Hi, Funners!</h3>
                        <p class="mb-5">Fun Bahasa memberikan kesempatan kepada Funners yang ingin mengirim karya/tulisan melalui laman funbahasa yang dapat dibaca oleh semua orang.</p>
                        <p class="mb-5">Tidak ada ketentuan khusus dalam penulisan, cukup pastikan penggunaan tanda baca, huruf kapital, dan sesuai dengan PUEBI. Serta jangan lupa melampirkan bionarasi singkat di bawah naskah tulisan. Tentu sebelumnya akan ada proses kurasi dari tim Fun Bahasa. Kami tunggu karya terbaik kalian ya, Funners!</p>
                        <p class="mb-5">Catatan: form ini bukan untuk mengirimkan karya/naskah dalam lomba yang diselenggarakan oleh Fun Bahasa.</p>
                    </div>
            </div>
        </div>
    </section>
@endsection
