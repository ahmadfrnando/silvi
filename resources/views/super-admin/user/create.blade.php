<x-app-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Akun Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold"><i class="fas fa-exclamation-circle"></i> Terjadi kesalahan!</strong>
                <ul class="mt-2">
                    <li>{{ session('error') }}</li>
                </ul>
            </div>
            @endif
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('super-admin.user.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Nama user -->
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 mb-1">Nama Pegawai</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                id="name"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama pegawai"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700 mb-1">Email Pegawai</label>
                            <input
                                type="text"
                                name="email"
                                value="{{ old('email') }}"
                                id="email"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan email pegawai"
                                required>
                        </div>
                        <div>
                            <label for="username" class="block font-medium text-sm text-gray-700 mb-1">Username</label>
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                id="username"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan username pegawai"
                                required>
                        </div>
                        <div>
                            <label for="password" class="block font-medium text-sm text-gray-700 mb-1">Password</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan password pegawai"
                                required>
                        </div>
                        <div>
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700 mb-1">Konfirmasi Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan konfirmasi password pegawai"
                                required>
                        </div>

                        <!-- Tombol Submit dan Kembali -->
                        <div class="flex space-x-4">
                            <div class="col-12 text-right">
                                <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Buat Akun Pengguna</button>
                            </div>
                        <!-- </div> -->
                    </form>
                    <div class="col-12 text-right">
                        <a href="{{ route('super-admin.aset.index') }}">
                            <button class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-super-admin-layout>