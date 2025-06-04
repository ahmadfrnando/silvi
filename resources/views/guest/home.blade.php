<x-guest-layout>
    <style>
        .hero-bg {
            background: url('{{ asset("gambar_desa.jpeg") }}') center/cover no-repeat;
        }

        .hero-bg img {
            filter: brightness(0.4) contrast(1.2) grayscale(0.8);
        }

        section {
            padding-top: 60px;
            padding-bottom: 60px;
        }

        .hero-bg {
            height: 500px;
        }

        .hero-content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .footer-links a {
            margin: 0 10px;
        }
    </style>
    <!-- Hero Section -->
    <section id="jelajah" class="hero-bg text-white relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="container mx-auto px-6 hero-content text-center relative z-10">
            <span class="text-5xl font-black mb-4 tracking-widest text-shadow-md transition-all ease-in-out duration-500 hover:text-green-600">
                Selamat Datang di Website {{ $websiteName ?? config('app.name', 'Website Desa') }}
            </span>
            <p class="text-lg mb-6 text-shadow-md transition-all ease-in-out duration-500 hover:text-gray-300">
                Membangun desa yang maju, mandiri, dan transparan untuk kesejahteraan bersama.
            </p>
        </div>
    </section>

    <!-- Statistik Penduduk -->
    <section id="statistik-penduduk" class="bg-gray-100 py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-green-600">Statistik Penduduk</h2>
            <div class="grid md:grid-cols-3 gap-12 text-center">
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <div class="text-4xl font-extrabold text-green-600" id="counter">{{ $statistikPenduduk->jumlah_penduduk ?? '0' }}</div>
                    <p class="text-gray-700">Penduduk</p>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <div class="text-4xl font-extrabold text-green-600" id="counter">{{ $statistikPenduduk->jumlah_laki_laki ?? '0' }}</div>
                    <p class="text-gray-700">Laki-laki</p>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <div class="text-4xl font-extrabold text-green-600" id="counter">{{ $statistikPenduduk->jumlah_perempuan ?? '0' }}</div>
                    <p class="text-gray-700">Perempuan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Desa -->
    <section id="berita">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-green-600">Berita Desa</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($berita as $item)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('storage/media/' . $item->media) }}" class="w-full h-40 object-cover rounded-t-lg transition-transform transform hover:scale-105" alt="{{ $item->judul }}">
                        <span class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded-full">{{ $item->kategori ?? 'Informasi' }}</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ Str::limit($item->isi, 150) }} <a href="/detail/{{ $item->id }}" class="text-blue-500 hover:underline">Baca Selengkapnya</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Peta Desa -->
    <section id="peta" class="bg-gray-100 py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-green-600">Peta Desa</h2>
            <div id="map-container" class="relative">
                <iframe src="{{ $statistikPenduduk->kordinat }}" class="w-full h-96 rounded-lg shadow-lg transition-all duration-500 ease-in-out"></iframe>
            </div>
        </div>
    </section>
</x-guest-layout>