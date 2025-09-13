<x-dash-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6 sm:ml-64">
            {{-- Header --}}
            <div class="max-w-screen-md mb-8 lg:mb-12">
                <h2 class="mb-2 text-3xl sm:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Welcome back, {{ auth()->user()->name }}
                </h2>
                <p class="text-gray-500 sm:text-lg dark:text-gray-400">
                    Ringkasan metrik website Anda.
                </p>
            </div>

            {{-- Cards grid --}}
            <div class="space-y-6 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 md:gap-6 md:space-y-0">
                {{-- Posts --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border-l-4 border-blue-600 dark:border-blue-500">
                    <div class="flex items-center justify-between mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 012-2h5l5 5v10a2 2 0 01-2 2H6a2 2 0 01-2-2V3z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Posts</h3>
                    <p class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        {{-- {{ $jumlahpost }} --}}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Total artikel yang terdaftar</p>
                </div>

                {{-- Categories --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border-l-4 border-emerald-600 dark:border-emerald-500">
                    <div class="flex items-center justify-between mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-300" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M3 3h8v8H3V3zm10 0h8v8h-8V3zM3 13h8v8H3v-8zm10 0h8v8h-8v-8z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Categories</h3>
                    <p class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        {{-- {{ $jumlahkategori }} --}}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Kelompok konten</p>
                </div>

                {{-- Pasien --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border-l-4 border-sky-600 dark:border-sky-500">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 rounded-full bg-sky-100 dark:bg-sky-900 flex items-center justify-center">
                            <svg class="w-5 h-5 text-sky-600 dark:text-sky-300" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5 1.34 3.5 3 3.5zM8 11c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05C16.97 14.1 19 15.11 19 16.5V19h3v-2.5c0-2.02-3.58-3.5-6-3.5z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Pasien</h3>
                    <p class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        {{-- {{ $jumlahpasien }} --}}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Jumlah pasien terdaftar</p>
                </div>

                {{-- Kecamatan --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border-l-4 border-amber-500 dark:border-amber-500">
                    <div class="flex items-center justify-between mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900 flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-300" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Kecamatan</h3>
                    <p class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        {{-- {{ $jumlahkecamatan }} --}}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Cakupan wilayah</p>
                </div>

                {{-- Dokter --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border-l-4 border-rose-600 dark:border-rose-500">
                    <div class="flex items-center justify-between mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center">
                            <svg class="w-5 h-5 text-rose-600 dark:text-rose-300" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M9 2h6a2 2 0 012 2v1h1a2 2 0 012 2v13a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h1V4a2 2 0 012-2zm0 3V4h6v1H9z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Dokter</h3>
                    <p class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        1000
                        {{-- {{ $jumlahdokter }} --}}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Tenaga medis aktif</p>
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>
