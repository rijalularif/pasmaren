<x-layout>
    <x-slot:title>{{ $title ?? 'Daftar Madrasah' }}</x-slot:title>

    <div class="w-full md:w-1/3">
        <form method="GET" class="flex items-center">
            <label for="q" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input id="q" name="q" value="{{ $q }}" type="search" autocomplete="off"
                    placeholder="Cari no statistik / nama / alamat..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-500 focus:border-primary-500
                                block w-full pl-10 p-2
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
        </form>
    </div>
    {{-- End Search --}}

    {{-- Pagination atas --}}
    <div class="px-4 max-w-screen-xl mx-auto">
        {{ $madrasahs->links() }}
    </div>

    {{-- Tabel Madrasah --}}
    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-2xl shadow">
            <table class="min-w-full text-sm text-left text-gray-600 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Madrasah</th>
                        <th class="px-4 py-3">No. Statistik</th>
                        <th class="px-4 py-3">Jenis</th>
                        <th class="px-4 py-3">Akreditasi</th>
                        <th class="px-4 py-3">Kecamatan</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($madrasahs as $madrasah)
                        <tr
                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration + ($madrasahs->firstItem() - 1) }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('madrasah.show', $madrasah->slug) }}"
                                    class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                                    {{ $madrasah->nama_lembaga }}
                                </a>
                            </td>
                            <td class="px-4 py-3">{{ $madrasah->no_statistik }}</td>
                            <td class="px-4 py-3">{{ $madrasah->jenis ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $madrasah->akreditasi ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $madrasah->kecamatan }}</td>
                            <td class="px-4 py-3">{{ $madrasah->status ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                Data madrasah tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination bawah --}}
    <div class="px-4 max-w-screen-xl mx-auto mt-6">
        {{ $madrasahs->links() }}
    </div>

</x-layout>
