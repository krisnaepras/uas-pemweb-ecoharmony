{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, User!</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</body>
</html> --}}

<x-app-layout>
    <section id="hero" class="h-screen flex items-center">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <!-- Left Side: Text Content -->
            <div class="flex-1 text-center md:text-left p-8">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 font-serif text-green-800">Selamat Datang di Desa Pintar
                </h1>
                <p class="text-lg md:text-xl mb-8 font-extralight">Dengan Smart Village, kami membawa solusi teknologi
                    untuk mengembangkan potensi desa dan menciptakan lingkungan yang lebih baik.</p>
                <div class="inline-block align-baseline space-y-4 md:space-y-0 md:space-x-4">
                    <input type="email" class="rounded-lg py-2 px-4 text-gray-700 " name="email" placeholder="Email">
                    <button
                        class="rounded-lg bg-green-800 hover:bg-green-300 text-white font-bold py-2 px-4">Login</button>
                </div>
            </div>
            <!-- Right Side: Image -->
            <div class="flex-1 p-8">
                <img src="https://lukaszadam.com/images/free-illustrations/package_service.svg" alt="Deskripsi Gambar"
                    class="w-full h-auto rounded-lg">
            </div>
        </div>
    </section>

    <section id="jelajah" class="py-16 bg-green-200 flex flex-col items-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-bold text-center mb-12 text-green-800 drop-shadow-lg">Berita Terbaru
            </h2>

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="bg-green-800 p-4">
                        <img class="w-full h-40 object-cover"
                            src="https://radarjatim.id/wp-content/uploads/2023/12/KKN-Mahasiswa-UPN-Veteran-Jatim-Ajarkan-Coding-ke-Siswa-Kelas-5-SDN-Medokan-Ayu-1-Surabaya.jpg"
                            alt="berita">
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-500">29 Desember 2023</p>
                        <h3 class="text-lg font-bold text-green-800">KKN Mahasiswa UPN Veteran Jatim Ajarkan Coding ke
                            Siswa SD</h3>
                        <p class="mt-2 text-gray-700 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Numquam vel sint dolorum consequuntur incidunt non rerum at, beatae quaerat explicabo
                            reiciendis, suscipit reprehenderit. In laboriosam dolor dolore, incidunt ut provident?</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="bg-green-800 p-4">
                        <img class="w-full h-40 object-cover"
                            src="https://img.antaranews.com/cache/800x533/2023/10/25/IMG-20231025-WA0020_3.jpg.webp"
                            alt="Illustration">
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-500">25 Oktober 2023</p>
                        <h3 class="text-lg font-bold text-green-800">Trenggalek gelar pilkades serentak di sembilan desa
                        </h3>
                        <p class="mt-2 text-gray-700 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Mollitia, nulla facere aut veniam nihil dolor amet eos saepe iusto? Aperiam earum dicta
                            quaerat animi impedit optio laudantium minus officiis hic?</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="bg-green-800 p-4">
                        <img class="w-full h-40 object-cover"
                            src="https://dinkominfo.demakkab.go.id/asset/foto_berita/WhatsApp_Image_2024-06-04_at_20_37_02.jpeg"
                            alt="Illustration">
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-500">5 Juni 2024</p>
                        <h3 class="text-lg font-bold text-green-800">Tradisi Apitan Desa, Arak Tujuh Gunungan Hasil Bumi
                        </h3>
                        <p class="mt-2 text-gray-700 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Aliquid optio sit, odio aliquam molestias ipsa perferendis sint itaque fugiat fuga repellat
                            aperiam excepturi recusandae commodi id et quo dolore facilis.</p>
                    </div>
                </div>
            </div>

            <div class="container w-full py-16 px-10 text-center">
                <button id="Berita" class="w-44 bg-green-800 text-white rounded-lg p-4">Lihat Selengkapnya</button>
            </div>

        </div>
    </section>


    <section id="toko" class="container bg-green-200 mx-auto mt-8">
        <h2 class="text-4xl md:text-6xl font-bold text-center mb-12 text-green-800 drop-shadow-lg">Produk Unggulan</h2>
        <div class="relative w-full overflow-hidden rounded-lg shadow-lg">
            <div class="relative h-96 md:h-[40rem]">
                <!-- Slides -->
                <div class="absolute inset-0 transition-opacity duration-500 ease-linear opacity-100" id="slide1">
                    <img src="https://sidedi-id.s3-id-jkt-1.kilatstorage.id/ledig/sukawera/profile/products/umi-azmi.jpg"
                        alt="Slide 1" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 transition-opacity duration-500 ease-linear opacity-0" id="slide2">
                    <img src="https://kertamulya-padalarang.desa.id/assets/files/data/website-desa-kertamulya-3217082001/perajin_ukm_ilustrasi_120421121.jpg"
                        alt="Slide 2" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 transition-opacity duration-500 ease-linear opacity-0" id="slide3">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjpWeRskv-fCFoaMskE6gvkkYSy-xny7tXZpcTdEPpfCZf5ubsrMdGKBe7EqyGhnp-f5Pk_CzLQDfHZV4anSzxo96pVOw6EbA7d6KzQFaJVL9eVaRlq4QCoerPkBD6Kj0-wDj3YCQTNcqSF/s820/kemasan+produk+umkm+desa+wisata.jpg"
                        alt="Slide 3" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Navigation Buttons -->
            <button
                class="absolute top-1/2 left-0 transform -translate-y-1/2 px-4 py-2 bg-gray-800 bg-opacity-50 text-white rounded-r focus:outline-none"
                onclick="prevSlide()">
                &lt;
            </button>
            <button
                class="absolute top-1/2 right-0 transform -translate-y-1/2 px-4 py-2 bg-gray-800 bg-opacity-50 text-white rounded-l focus:outline-none"
                onclick="nextSlide()">
                &gt;
            </button>
        </div>

        <div class="container w-full py-16 px-10 text-center">
            <button id="Toko" class="w-44 bg-green-800 text-white rounded-lg p-4">Lihat Selengkapnya</button>
        </div>

        <script>
            let currentSlide = 1;
            const totalSlides = 3;

            function showSlide(slideIndex) {
                for (let i = 1; i <= totalSlides; i++) {
                    const slide = document.getElementById(`slide${i}`);
                    slide.style.opacity = (i === slideIndex) ? '1' : '0';
                }
            }

            function nextSlide() {
                currentSlide = (currentSlide % totalSlides) + 1;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 2 + totalSlides) % totalSlides + 1;
                showSlide(currentSlide);
            }

            // Auto slide
            setInterval(nextSlide, 3000);

            // Show the first slide initially
            showSlide(currentSlide);
        </script>
    </section>
</x-app-layout>
