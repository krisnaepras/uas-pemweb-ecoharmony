<x-app-layout>
    <section id="hero" class="relative h-screen flex items-center justify-center bg-black">
        <div class="absolute inset-0 z-10 bg-black opacity-50"></div>
        <img src="{{ asset('images/pegunungan.jpg') }}" alt="Banner" class="absolute inset-0 h-full w-full object-cover">
        <div class="relative z-20 text-center text-white px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold font-serif">Selamat Datang di Eco Harmony</h1>
            <p class="mt-4 text-l font-sans">sebuah inisiatif dari Desa Janti, Kecamatan Mojoagung, Kota Jombang. Website
                ini dirancang untuk mendukung dan memberdayakan masyarakat dengan fitur-fitur unggulannya. Fitur toko
                kami menyediakan berbagai produk lokal hasil karya warga desa, mendukung ekonomi lokal dan pelaku usaha
                kecil. Melalui fitur bank sampah, warga dapat menukar sampah yang mereka kumpulkan dengan poin yang bisa
                digunakan untuk berbelanja atau keperluan lainnya. Selain itu, kami juga menyediakan berita terkini
                seputar kegiatan, program, dan perkembangan di Desa Janti, memastikan Anda selalu terinformasi dengan
                baik. Bergabunglah dengan kami dalam menciptakan harmoni antara masyarakat dan lingkungan di Eco
                Harmony.</p>
        </div>
    </section>

    <section id="jelajah" class="p-16 bg-green-200 flex flex-col items-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-bold text-center mb-12 text-green-800 drop-shadow-lg font-serif">Berita
                Terbaru
            </h2>

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($beritaTerbaru as $berita)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="bg-green-800 p-4">
                            <img class="w-full h-40 object-cover" src="{{ asset('storage/' . $berita->gambar) }}" alt="berita">
                        </div>
                        <div class="p-4">
                            <p class="text-sm text-gray-500">{{ $berita->created_at->format('d F Y') }}</p>
                            <h3 class="text-lg font-bold text-green-800">{{ $berita->judul }}</h3>
                            <p class="mt-2 text-gray-700 text-sm">{{ Str::limit($berita->isi, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container w-full py-16 px-10 text-center">
                <a href="{{ route('berita.index') }}" class="w-44 bg-green-800 text-white rounded-lg p-4">Lihat
                    Selengkapnya</a>
            </div>

        </div>
    </section>

    <section id="toko" class="container bg-green-200 mx-auto mt-auto p-12">
        <h2 class="text-4xl md:text-6xl font-bold text-center mb-12 text-green-800 font-serif drop-shadow-lg">Produk
            Unggulan</h2>
        <div class="relative w-full overflow-hidden rounded-lg p-12">
            <div class="relative h-96 md:h-[40rem] p-8">
                @foreach ($produkUnggulan as $index => $produk)
                    <div class="absolute inset-0 transition-opacity duration-500 ease-linear {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                        id="slide{{ $index + 1 }}">
                        <img src="{{ asset('images/' . $produk->gambar_produk) }}" alt="Slide {{ $index + 1 }}"
                            class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>

            <div class="container w-full py-16 px-10 text-center">
                <a href="{{ route('user.products.index') }}" class="w-44 bg-green-800 text-white rounded-lg p-4">Lihat
                    Selengkapnya</a>
            </div>

            <script>
                let currentSlide = 1;
                const totalSlides = {{ count($produkUnggulan) }};

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
