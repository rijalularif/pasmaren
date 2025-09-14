<x-dash-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 sm:ml-64">
        <form action="/dashboard/lembagas/{{ $lembaga->slug }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                {{-- No. Statistik --}}
                <div>
                    <label for="no_statistik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        No. Statistik
                    </label>
                    <input type="text" name="no_statistik" id="no_statistik"
                        class="form-control @error('no_statistik') is-invalid @enderror
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: 121113080001" required autofocus
                        value="{{ old('no_statistik', $lembaga->no_statistik) }}">
                    @error('no_statistik')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NPSN --}}
                <div>
                    <label for="npsn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NPSN (Opsional)
                    </label>
                    <input type="text" name="npsn" id="npsn"
                        class="form-control @error('npsn') is-invalid @enderror
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: 10311287" value="{{ old('npsn', $lembaga->npsn) }}">
                    @error('npsn')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Lembaga --}}
                <div class="sm:col-span-2">
                    <label for="nama_lembaga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Lembaga
                    </label>
                    <input type="text" name="nama_lembaga" id="nama_lembaga"
                        class="form-control @error('nama_lembaga') is-invalid @enderror
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="contoh: MTsN 1 Pasaman" required
                        value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}">
                    @error('nama_lembaga')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="sm:col-span-2">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Slug (Otomatis)
                    </label>
                    <input type="text" name="slug" id="slug"
                        class="form-control @error('slug') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="slug" required value="{{ old('slug', $lembaga->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jenis Lembaga --}}
                <div>
                    <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Lembaga
                    </label>
                    @php
                        $opsi = [
                            'RA' => 'Raudhatul Athfal',
                            'MI' => 'Madrasah Ibtidaiyah',
                            'MTs' => 'Madrasah Tsanawiyah',
                            'MA' => 'Madrasah Aliyah',
                            'PP' => 'Pondok Pesantren',
                            'LPQ' => 'Lembaga Pendidikan Al-Qur’an',
                            'MDT' => 'Madrasah Diniyah Takmiliyah',
                        ];
                        $selected = old('jenis', $lembaga->jenis);
                    @endphp
                    <select id="jenis" name="jenis"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required>
                        <option value="" disabled {{ $selected ? '' : 'selected' }}>Pilih Jenis</option>
                        @foreach ($opsi as $val => $label)
                            <option value="{{ $val }}" @selected($selected === $val)>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Akreditasi --}}
                <div>
                    <label for="akreditasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Akreditasi
                    </label>
                    @php
                        $opsi = ['A' => 'A', 'B' => 'B', 'C' => 'C', '-' => '-'];
                        $selected = old('akreditasi', $lembaga->akreditasi);
                    @endphp
                    <select id="akreditasi" name="akreditasi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" disabled {{ $selected ? '' : 'selected' }}>Akreditasi</option>
                        @foreach ($opsi as $val => $label)
                            <option value="{{ $val }}" @selected($selected === $val)>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('akreditasi')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jumlah Guru, Siswa, Rombel --}}
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Data Jumlah
                    </label>
                    <div class="grid gap-4 sm:grid-cols-3">
                        {{-- Jumlah Guru --}}
                        <div>
                            <input type="number" name="jumlah_guru" id="jumlah_guru" min="0"
                                class="form-control @error('jumlah_guru') is-invalid @enderror
                                bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Guru" value="{{ old('jumlah_guru', $lembaga->jumlah_guru) }}">
                            @error('jumlah_guru')
                                <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jumlah Siswa --}}
                        <div>
                            <input type="number" name="jumlah_siswa" id="jumlah_siswa" min="0"
                                class="form-control @error('jumlah_siswa') is-invalid @enderror
                                bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Siswa" value="{{ old('jumlah_siswa', $lembaga->jumlah_siswa) }}">
                            @error('jumlah_siswa')
                                <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jumlah Rombel --}}
                        <div>
                            <input type="number" name="jumlah_rombel" id="jumlah_rombel" min="0"
                                class="form-control @error('jumlah_rombel') is-invalid @enderror
                                bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Rombel" value="{{ old('jumlah_rombel', $lembaga->jumlah_rombel) }}">
                            @error('jumlah_rombel')
                                <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="sm:col-span-2">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat
                    </label>
                    <textarea name="alamat" id="alamat" rows="4"
                        class="form-control @error('alamat') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tulis alamat lengkap..." required>{{ old('alamat', $lembaga->alamat) }}
                    </textarea>
                    @error('alamat')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kecamatan --}}
                <div class="sm:col-span-2">
                    <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kecamatan
                    </label>
                    <select id="kecamatan" name="kecamatan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required>

                        <option value="" disabled {{ old('kecamatan', $lembaga->kecamatan) ? '' : 'selected' }}>
                            Pilih Kecamatan
                        </option>
                        @foreach (['Lubuk Sikaping', 'Bonjol', 'Duo Koto', 'Panti', 'Mapat Tunggul', 'Mapat Tunggul Selatan', 'Padang Gelugur', 'Rao', 'Rao Selatan', 'Rao Utara', 'Simpang Alahan Mati', 'Tigo Nagari'] as $kec)
                            <option value="{{ $kec }}" @selected(old('kecamatan', $lembaga->kecamatan) == $kec)>
                                {{ $kec }}
                            </option>
                        @endforeach
                    </select>

                    @error('kecamatan')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- URL Embed Maps --}}
                <div class="sm:col-span-2">
                    <label for="map_embed_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        URL Embed Maps (opsional)
                    </label>
                    <input type="url" name="map_embed_url" id="map_embed_url"
                        class="form-control @error('map_embed_url') is-invalid @enderror 
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="https://www.google.com/maps/embed?pb=..."
                        value="{{ old('map_embed_url', $lembaga->map_embed_url) }}">
                    @error('map_embed_url')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">
                        Tips: jika URL berisi koordinat (mis. <code>?q=LAT,LNG</code>), latitude & longitude bisa
                        otomatis terisi.
                    </p>
                </div>

                {{-- Latitude & Longitude --}}
                <div>
                    <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Latitude
                    </label>
                    <input type="text" name="latitude" id="latitude" inputmode="decimal"
                        class="form-control @error('latitude') is-invalid @enderror 
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="-0.05480612" value="{{ old('latitude', $lembaga->latitude) }}">
                    @error('latitude')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Longitude
                    </label>
                    <input type="text" name="longitude" id="longitude" inputmode="decimal"
                        class="form-control @error('longitude') is-invalid @enderror 
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="100.20053275" value="{{ old('longitude', $lembaga->longitude) }}">
                    @error('longitude')
                        <div class="invalid-feedback text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Button --}}
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white
                bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Update Lembaga
            </button>
        </form>

        {{-- Slug script --}}
        <script>
            const nama_lembaga = document.querySelector('#nama_lembaga');
            const slug = document.querySelector('#slug');
            nama_lembaga.addEventListener('change', function() {
                fetch('/dashboard/lembaga/checkSlug?nama_lembaga=' + nama_lembaga.value)
                    .then(
                        response => response.json()
                    )
                    .then(data => slug.value = data.slug)
            });
        </script>

        {{-- OPSIONAL: auto-parse lat/long dari URL Google Maps --}}
        <script>
            const urlEl = document.getElementById('map_embed_url');
            const latEl = document.getElementById('latitude');
            const lngEl = document.getElementById('longitude');

            function tryFillLatLngFromUrl(u) {
                if (!u) return;
                try {
                    // 1) Pola q=LAT,LNG (contoh: ...?q=0.4402005,100.0432371)
                    const url = new URL(u);
                    const q = url.searchParams.get('q');
                    if (q && /-?\d+(\.\d+)?\s*,\s*-?\d+(\.\d+)?/.test(q)) {
                        const [lat, lng] = q.split(',').map(s => s.trim());
                        if (lat && lng) {
                            if (!latEl.value) latEl.value = lat;
                            if (!lngEl.value) lngEl.value = lng;
                            return;
                        }
                    }
                    // 2) Pola !2dLNG!3dLAT dari embed pb
                    // contoh: ...!2d100.2000160!3d-0.0548061...
                    const m = u.match(/!2d(-?\d+(?:\.\d+)?)!3d(-?\d+(?:\.\d+)?)/);
                    if (m) {
                        const lng = m[1],
                            lat = m[2];
                        if (!latEl.value) latEl.value = lat;
                        if (!lngEl.value) lngEl.value = lng;
                        return;
                    }
                } catch (e) {
                    /* ignore */
                }
            }
            urlEl?.addEventListener('change', e => tryFillLatLngFromUrl(e.target.value));
            // Coba isi saat load jika sudah ada value lama
            tryFillLatLngFromUrl(urlEl?.value);
        </script>

    </div>
</x-dash-layout>
