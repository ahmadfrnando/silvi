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
                <a href="#jelajah" class="text-green-600 hover:text-green-800">Jelajahi Desa</a>
                <a href="#peta" class="text-green-600 hover:text-green-800">Peta Desa</a>
                <a href="#berita" class="text-green-600 hover:text-green-800">Berita</a>
                <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-bg text-white">
        <div class="container mx-auto px-6 hero-content text-center">
            <h1 class="text-5xl font-bold mb-4">Selamat Datang di {{ $statistikPenduduk->nama_desa ?? 'Desa' }}</h1>
            <p class="text-lg mb-6">Membangun desa yang maju, mandiri, dan transparan untuk kesejahteraan bersama.</p>
        </div>
    </section>

    <!-- Jelajahi Desa -->
    <section id="jelajah">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Jelajahi Desa</h2>
            <div class="grid md:grid-cols-3 gap-12 text-center">
                <div class="p-6 bg-white shadow rounded-lg">
                    <img src="{{ asset('informasi.png') }}" class="w-16 h-16 mx-auto mb-6" alt="Fitur 1">
                    <h3 class="text-xl font-bold">Informasi Desa</h3>
                    <p class="text-gray-700">Temukan semua informasi penting tentang Desa Perkebunan Tambunan.</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <img src="{{ asset('agenda.png') }}" class="w-16 h-16 mx-auto mb-6" alt="Fitur 2">
                    <h3 class="text-xl font-bold">Kegiatan Desa</h3>
                    <p class="text-gray-700">Lihat agenda dan aktivitas desa terkini.</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <img src="{{ asset('layanan.png') }}" class="w-16 h-16 mx-auto mb-6" alt="Fitur 3">
                    <h3 class="text-xl font-bold">Layanan Masyarakat</h3>
                    <p class="text-gray-700">Beragam layanan untuk memenuhi kebutuhan warga desa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Desa -->
    <section id="peta" class="bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Peta Desa</h2>
            <div class="flex justify-center">
                <!-- <iframe src="https://www.google.com/maps/embed?..." class="w-full md:w-3/4 h-96 rounded-lg shadow" frameborder="0"></iframe> -->
                <iframe src="{{ $statistikPenduduk->kordinat }}" class="w-full md:w-3/4 h-96 rounded-lg shadow" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- Statistik Penduduk -->
    <section>
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Statistik Penduduk</h2>
            <div class="grid md:grid-cols-3 gap-12 text-center">
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-4xl font-bold text-green-600">{{ $statistikPenduduk->jumlah_penduduk ?? '0' }}</h3>
                    <p class="text-gray-700">Penduduk</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-4xl font-bold text-green-600">{{ $statistikPenduduk->jumlah_laki_laki ?? '0' }}</h3>
                    <p class="text-gray-700">Laki-laki</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-4xl font-bold text-green-600">{{ $statistikPenduduk->jumlah_perempuan ?? '0' }}</h3>
                    <p class="text-gray-700">Perempuan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Desa -->
    <section id="berita" class="bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Berita Desa</h2>
            <div class="row">
                @foreach($berita as $item)
                <div class="p-6 bg-white shadow rounded-lg md:grid-cols-2 lg:grid-cols-3">
                    <img src="{{ asset('storage/media/'. $item->media) }}" class="w-full h-40 object-cover rounded-lg mb-6" alt="{{ $item->judul }}">
                    <h3 class="text-lg font-bold mb-4">{{ $item->judul }}</h3>
                    <p class="text-gray-700 mb-4">{{  Str::limit($item->isi, 150) }}</p>
                    <a href="/detail/{{ $item->id }}" class="text-green-600 font-bold inline-block">Baca Selengkapnya</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="galeri" class="bg-gray-800 text-gray-400 py-12">
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg font-semibold mb-4">&copy; 2025 Desa Perkebunan Tambunan. Semua Hak Dilindungi.</p>
        </div>
    </footer>
</x-guest-layout>