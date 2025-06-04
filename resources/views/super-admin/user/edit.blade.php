<x-app-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Akun') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('super-admin.user.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 mb-1">Nama Pegawai</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ $user->name }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama pegawai"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700 mb-1">Email Pegawai</label>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                value="{{ $user->email }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan email pegawai"
                                required>
                        </div>
                        <div>
                            <label for="username" class="block font-medium text-sm text-gray-700 mb-1">Username</label>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                value="{{ $user->username }}"
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
                                value="{{ $user->password }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan password pegawai"
                                required>
                        </div>
                        <div>
                            <label for="password_confirmed" class="block font-medium text-sm text-gray-700 mb-1">Konfirmasi Password</label>
                            <input
                                type="password"
                                name="password_confirmed"
                                id="password_confirmed"
                                value="{{ $user->password }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan password_confirmed pegawai"
                                required>
                        </div>

                        <!-- Tombol Update dan Kembali -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                                Update
                            </button>
                            <a href="{{ route('super-admin.user.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 shadow-lg">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-super-admin-layout>