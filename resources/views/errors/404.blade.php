<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-blue-500">404</h1>
        <p class="text-lg text-gray-700 mt-4">Oops! Halaman yang Anda cari tidak ditemukan.</p>
        <p class="text-gray-500 mt-2">URL yang Anda akses mungkin salah atau halaman telah dihapus.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
            <i class="fas fa-home mr-2"></i> Kembali ke Beranda
        </a>
    </div>
</body>

</html>