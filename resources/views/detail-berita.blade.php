<x-guest-layout>
    <style>
        .hero-bg {
            background: url('{{ asset("background.jpg") }}') center/cover no-repeat;
        }

        .hero-bg img {
            filter: brightness(0.4) contrast(1.2) grayscale(0.8);
        }

        header {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        section {
            padding-top: 60px;
            padding-bottom: 60px;
        }

        .hero-bg {
            height: 300px;
        }

        .hero-content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

    <!-- Header -->
    <header class="bg-white">
        <div class="container mx-auto px-6 py-6 flex justify-between items-center">
            <a href="/" class="flex items-center gap-4">
                <x-application-logo class="block h-12 w-auto" />
                <div class="text-2xl font-bold text-green-600">
                    {{ $statistikPenduduk->nama_desa ?? 'Desa' }}
                </div>
            </a>
            <nav class="flex items-center space-x-8">
                <a href="/" class="text-green-600 hover:text-green-800">Beranda</a>
                <a href="#berita" class="text-green-600 hover:text-green-800">Berita</a>
                <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-bg text-white">
        <div class="container mx-auto px-6 hero-content text-center">
            <h1 class="text-4xl font-bold mb-4">Detail Berita</h1>
            <p class="text-lg">Selengkapnya tentang berita Desa Perkebunan Tambunan.</p>
        </div>
    </section>

    <!-- Detail Berita -->
    <section id="detail-berita">
        <div class="container mx-auto px-6">
            <div class="bg-white shadow rounded-lg p-6">
                <img src="{{ asset('storage/media/' . $berita->media) }}" class="w-full h-64 object-cover rounded-lg mb-6" alt="{{ $berita->judul }}">
                <h2 class="text-3xl font-bold text-green-600 mb-4">{{ $berita->judul }}</h2>
                <p class="text-gray-500 text-sm mb-6">Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}</p>
                <div class="text-gray-700 leading-relaxed mb-6">
                    {{ $berita->isi }}
                </div>
                <a href="/" class="text-green-600 font-bold inline-block">&larr; Kembali ke Berita</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-12">
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg font-semibold mb-4">&copy; 2025 Desa Perkebunan Tambunan. Semua Hak Dilindungi.</p>
        </div>
    </footer>
</x-guest-layout>