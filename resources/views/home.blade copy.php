<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi Desa Perkebunan Tambunan</title>
    @vite(['resources/css/app.css'])
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
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-50">

    <!-- Header -->
    <header class="bg-white">
        <div class="container mx-auto px-6 py-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-green-600">
                Desa Perkebunan Tambunan
            </div>
            <nav class="flex items-center space-x-8">
                <a href="#jelajah" class="text-green-600 hover:text-green-800">Jelajahi Desa</a>
                <a href="#peta" class="text-green-600 hover:text-green-800">Peta Desa</a>
                <a href="#berita" class="text-green-600 hover:text-green-800">Berita</a>
                <a href="#galeri" class="text-green-600 hover:text-green-800">Galeri</a>
                <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-bg text-white">
        <div class="container mx-auto px-6 hero-content text-center">
            <h1 class="text-5xl font-bold mb-4">Selamat Datang di Desa Perkebunan Tambunan</h1>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63723.29834908594!2d98.27382614660637!3d3.4215806175097203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3030dd299b2e0669%3A0x51b0ab509a4a4b0b!2sPerkebunan%20Tambunan%2C%20Kec.%20Salapian%2C%20Kabupaten%20Langkat%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1737310164611!5m2!1sid!2sid" class="w-full md:w-3/4 h-96 rounded-lg shadow" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- Statistik Penduduk -->
    <section>
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Statistik Penduduk</h2>
            <div class="grid md:grid-cols-3 gap-12 text-center">
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-4xl font-bold text-green-600">1,243</h3>
                    <p class="text-gray-700">Penduduk</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-4xl font-bold text-green-600">599</h3>
                    <p class="text-gray-700">Laki-laki</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-4xl font-bold text-green-600">544</h3>
                    <p class="text-gray-700">Perempuan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Desa -->
    <section id="berita" class="bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Berita Desa</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="p-6 bg-white shadow rounded-lg">
                    <img src="{{ asset('background.jpg') }}" class="w-full h-40 object-cover rounded-lg mb-6" alt="test">
                    <h3 class="text-lg font-bold mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h3>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis necessitatibus, velit temporibus iusto minus quod accusamus deserunt corporis eaque ullam!</p>
                    <a href="#" class="text-green-600 font-bold inline-block">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="galeri" class="bg-gray-800 text-gray-400 py-12">
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg font-semibold mb-4">&copy; 2025 Desa Perkebunan Tambunan. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>

</html>