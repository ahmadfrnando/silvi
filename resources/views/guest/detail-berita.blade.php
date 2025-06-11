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
            height: 300px;
        }

        .hero-content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-bg text-white relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="container mx-auto px-6 hero-content text-center relative z-10">
            <h1 class="text-4xl font-bold mb-4 tracking-widest text-shadow-md transition-all ease-in-out duration-500 hover:text-green-600">Detail Berita</h1>
            <p class="text-lg">Selengkapnya tentang berita Desa Perkebunan Tambunan.</p>
        </div>
    </section>

    <!-- Detail Berita -->
    <section id="detail-berita" class="flex flex-wrap px-8">
        <div class="w-full md:w-2/3 px-2">
            <div class="container mx-auto px-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <img src="{{ asset('storage/media/' . $berita->media) }}" class="w-full h-64 object-cover rounded-lg mb-6" alt="{{ $berita->judul }}">
                    <p class="text-gray-500 text-sm">Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}</p>
                    <h2 class="text-3xl font-bold text-green-600 mb-4">{{ $berita->judul }}</h2>
                    <div class="text-gray-700 text-justify leading-relaxed mb-6">
                        {{ $berita->isi }}
                    </div>
                    <a href="{{ $berita->link_sumber }}" class="text-blue-500 hover:underline" target="_blank">Sumber berita</a>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-2">
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg">
                <div class="border-b border-gray-200 p-4">
                    <h1 class="text-xl font-semibold tracking-widest text-gray-800">Berita Terbaru</h1>
                </div>
                @foreach($beritas as $b)
                <a href="{{ route('detail-berita', $b->id) }}">
                    <button class="relative inline-flex w-full px-8 py-8 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-green-200 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                        <img src="{{ asset('storage/media/' . $b->media) }}" class="w-40 h-40 object-cover rounded mr-2" alt="{{ $b->judul }}">
                        <div class="ms-2">
                            <h2 class="text-gray-800 text-left">{{ $b->judul }}</h2>
                            <p class="text-gray-400 text-left text-sm">Dipublikasikan pada {{ $b->created_at->format('d M Y') }}</p>
                            <p class="text-gray-600 text-justify mt-4">{{ Str::limit($b->isi, 100) }}</p>
                        </div>
                    </button>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>