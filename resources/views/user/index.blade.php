<x-app-layout>
    <section id="hero" class="relative h-screen flex items-center justify-center bg-black">
        <div class="absolute inset-0 z-10 bg-black opacity-50"></div>
            <img src="{{ asset('images/pegunungan.jpg') }}" alt="Banner" class="absolute inset-0 h-full w-full object-cover">
        <div class="relative z-20 text-center text-white px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold font-serif">Selamat Datang di Eco Harmony</h1>
            <p class="mt-4 text-l font-sans">sebuah inisiatif dari Desa Janti, Kecamatan Mojoagung, Kota Jombang. Website ini dirancang untuk mendukung dan memberdayakan masyarakat dengan fitur-fitur unggulannya. Fitur toko kami menyediakan berbagai produk lokal hasil karya warga desa, mendukung ekonomi lokal dan pelaku usaha kecil. Melalui fitur bank sampah, warga dapat menukar sampah yang mereka kumpulkan dengan poin yang bisa digunakan untuk berbelanja atau keperluan lainnya. Selain itu, kami juga menyediakan berita terkini seputar kegiatan, program, dan perkembangan di Desa Janti, memastikan Anda selalu terinformasi dengan baik. Bergabunglah dengan kami dalam menciptakan harmoni antara masyarakat dan lingkungan di Eco Harmony.</p>
        </div>
    </section>

    <section id="jelajah" class="p-16 bg-green-200 flex flex-col items-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-bold text-center mb-12 text-green-800 drop-shadow-lg font-serif">Berita Terbaru
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


    <section id="toko" class="container bg-green-200 mx-auto mt-auto p-12">
        <h2 class="text-4xl md:text-6xl font-bold text-center mb-12 text-green-800 font-serif drop-shadow-lg">Produk Unggulan</h2>
        <div class="relative w-full overflow-hidden rounded-lg p-12">
            <div class="relative h-96 md:h-[40rem] p-8">
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