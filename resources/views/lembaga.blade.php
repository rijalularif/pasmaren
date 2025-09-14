<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article
        class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">

        {{-- Header --}}
        <header class="mb-4 lg:mb-6 not-format">
            <a href="{{ url()->previous() }}"
                class="font-medium text-xs text-gray-500 dark:text-gray-400 hover:underline">
                &laquo; Back to all data
            </a>
            <h1
                class="mt-4 mb-2 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-4 lg:text-4xl dark:text-white">
                {{ $lembaga->nama_lembaga }}
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                {{ $lembaga->alamat }}, {{ $lembaga->kecamatan }}
            </p>
        </header>

        {{-- Info lembaga --}}
        <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 not-format">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Informasi Umum</h2>
                <dl class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                    <div class="flex justify-between">
                        <dt class="font-medium">No. Statistik</dt>
                        <dd>{{ $lembaga->no_statistik }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium">NPSN</dt>
                        <dd>{{ $lembaga->npsn ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium">Jenis</dt>
                        <dd>{{ $lembaga->jenis ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium">Akreditasi</dt>
                        <dd>{{ $lembaga->akreditasi ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium">Status</dt>
                        <dd>{{ $lembaga->status ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Data Statistik</h2>
                <dl class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                    <div class="flex justify-between">
                        <dt class="font-medium">Jumlah Guru</dt>
                        <dd>{{ $lembaga->jumlah_guru ?? 0 }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium">Jumlah Siswa</dt>
                        <dd>{{ $lembaga->jumlah_siswa ?? 0 }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium">Jumlah Rombel</dt>
                        <dd>{{ $lembaga->jumlah_rombel ?? 0 }}</dd>
                    </div>
                </dl>
            </div>
        </section>

        {{-- Peta --}}
        <section class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 not-format">
            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Lokasi di Peta</h2>
            @if ($lembaga->map_embed_url)
                <div class="aspect-video w-full overflow-hidden rounded-lg">
                    <iframe src="{{ $lembaga->map_embed_url }}" width="100%" height="100%" style="border:0;"
                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            @elseif($lembaga->latitude && $lembaga->longitude)
                <div class="aspect-video w-full overflow-hidden rounded-lg">
                    <iframe width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen
                        src="https://www.google.com/maps/embed/v1/view?key={{ env('GOOGLE_MAPS_API_KEY') }}&center={{ $lembaga->latitude }},{{ $lembaga->longitude }}&zoom=15">
                    </iframe>
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400">Lokasi belum tersedia.</p>
            @endif
        </section>
    </article>

</x-layout>
