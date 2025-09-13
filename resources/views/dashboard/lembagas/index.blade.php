<x-dash-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Notification --}}
    @if (session()->has('success'))
        <div id="alert-success"
            class="sm:ml-64 mb-4 flex items-center rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3 text-sm font-medium shadow-sm"
            role="alert">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8.364 8.364a1 1 0 01-1.414 0L3.293 11.12a1 1 0 111.414-1.414L8 13l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                const el = document.getElementById('alert-success');
                if (!el) return;
                el.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => el.remove(), 550);
            }, 2000);
        </script>
    @endif

    <div class="mx-auto max-w-screen-xl px-4 lg:px-1 sm:ml-64">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <!-- Search -->
                <div class="w-full md:w-1/2">
                    <form method="GET" class="flex items-center">
                        <label for="q" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="q" name="q" value="{{ $q }}" type="search"
                                autocomplete="off" placeholder="Cari no statistik / nama / alamat..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-500 focus:border-primary-500
                                block w-full pl-10 p-2
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                    </form>
                </div>
                <!-- Actions (Create) -->
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row items-stretch md:items-center justify-end md:space-x-3 space-y-2 md:space-y-0 flex-shrink-0">
                    <a href="/dashboard/lembagas/create"
                        class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2
                        dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah Lembaga
                    </a>
                </div>
            </div>
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No. Statistik</th>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">Jenis</th>
                            <th scope="col" class="px-4 py-3">Alamat</th>
                            <th scope="col" class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $it)
                            @php
                                $ddId = 'actions-' . $it->id;
                            @endphp
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">
                                    {{ $it->no_statistik }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $it->nama_lembaga }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $it->jenis }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ \Illuminate\Support\Str::limit($it->alamat, 60) }}
                                </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <!-- Toggle -->
                                    <button id="{{ $ddId }}-button" data-dropdown-toggle="{{ $ddId }}"
                                        class="inline-flex items-center p-1.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none
                                        dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button" aria-haspopup="true" aria-expanded="false">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <!-- Dropdown -->
                                    <div id="{{ $ddId }}"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow
                                        dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ $ddId }}-button">
                                            <li>
                                                <a href="/dashboard/lembagas/{{ $it->slug }}/edit"
                                                    class="block py-2 px-4 hover:bg-gray-100 
                                                    dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Edit
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="/dashboard/lembagas/{{ $it->slug }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button onclick="return confirm('Hapus data ini?')"
                                                    class="w-full text-left block py-2 px-4 text-sm text-red-600 hover:bg-red-50
                                                    dark:text-red-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if ($items->isEmpty())
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                    Data tidak ditemukan.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="my-6 px-4">
                {{ $items->links() }}
            </div>
        </div>
    </div>
    
</x-dash-layout>
