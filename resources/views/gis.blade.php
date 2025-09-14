<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <style>
        @media (min-width: 100px) {
            #map {
                height: 100vh;
            }
        }

        .info {
            padding: 6px 8px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            font-size: 14px;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.8;
        }
    </style>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
        <!-- Peta -->
        <div class="lg:col-span-3">
            <div id="map" class="rounded-2xl shadow overflow-hidden"></div>
        </div>

        <aside class="lg:col-span-1 bg-white dark:bg-gray-800 rounded-2xl shadow p-5">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Filter</h2>

            <!-- Filter Kecamatan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kecamatan</label>
                <select id="filter-kecamatan" class="w-full rounded-lg border-gray-300 dark:border-gray-600">
                    <option value="">Semua</option>
                    @foreach ($lembaga->pluck('kecamatan')->unique() as $kec)
                        <option value="{{ $kec }}">{{ $kec }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jenis Lembaga</label>
                    <!-- header untuk kolom -->
                    <div class="flex justify-between text-xs font-semibold text-gray-500 dark:text-gray-400 mb-1">
                        <span>Kategori</span>
                        <span>Jumlah</span>
                    </div>

                    <div class="space-y-2">
                        @foreach (['PP' => 'icons/pp.png', 'RA' => 'icons/ra.png', 'MI' => 'icons/mi.png', 'MTs' => 'icons/mts.png', 'MA' => 'icons/ma.png', 'LPQ' => 'icons/lpq.png', 'MDT' => 'icons/mdt.png',] as $jenis => $icon)
                            <div class="flex items-center">
                                <input type="checkbox" class="filter-jenis" value="{{ $jenis }}" checked>
                                <img src="{{ asset($icon) }}" alt="{{ $jenis }}" class="h-5 w-5 ml-2">
                                <label class="ml-2 text-gray-800 dark:text-gray-200">{{ $jenis }}</label>

                                <!-- jumlah total di kanan -->
                                <span id="count-{{ $jenis }}"
                                    class="ml-auto text-sm text-gray-500 dark:text-gray-400">
                                    {{ $lembagaCounts[$jenis]->total ?? 0 }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </aside>
    </div>

    <script>
        var map = L.map('map').setView([0.3918718, 100.0278408], 11);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        var lembaga = @json($lembaga);

        function getIcon(jenis) {
            let iconUrl;
            switch (jenis) {
                case "RA":
                    iconUrl = "icons/ra.png";
                    break;
                case "MI":
                    iconUrl = "icons/mi.png";
                    break;
                case "MTs":
                    iconUrl = "icons/mts.png";
                    break;
                case "MA":
                    iconUrl = "icons/ma.png";
                    break;
                case "LPQ":
                    iconUrl = "icons/lpq.png";
                    break;
                case "MDT":
                    iconUrl = "icons/mdt.png";
                    break;
                case "PP":
                    iconUrl = 'icons/pp.png';
                    break;
            }
            return L.icon({
                iconUrl: iconUrl,
                iconSize: [32, 32], // ukuran marker
                iconAnchor: [16, 32], // posisi anchor
                popupAnchor: [0, -32] // posisi popup
            });
        }

        fetch("storage/pasaman.geojson")
            .then(res => res.json())
            .then(data => {
                // Menyimpan batas seluruh geojson untuk digunakan nanti
                var geoJsonBounds = null;

                var batas = L.geoJSON(data, {
                    style: {
                        color: "blue",
                        weight: 1,
                        fillOpacity: 0.1
                    },
                    onEachFeature: function(feature, layer) {
                        // Mengecek jika properti "district" ada
                        if (feature.properties && feature.properties.district) {
                            // Menampilkan popup dengan data dari properties.geojson
                            layer.bindPopup(`
                        <b>Kecamatan: ${feature.properties.district}</b>
                        <br>Nagari: ${feature.properties.village}<br>
                    `);

                            // Saat klik pada fitur, zoom ke lokasi tersebut
                            layer.on('click', function() {
                                map.fitBounds(layer.getBounds()); // Zoom ke batas fitur (district)
                            });
                        }
                    }
                }).addTo(map);

                // Menyimpan batas keseluruhan geojson untuk digunakan di tombol kembali
                geoJsonBounds = batas.getBounds();

                // Zoom otomatis ke batas geojson (untuk melihat semua fitur pada awalnya)
                map.fitBounds(geoJsonBounds);

                // Membuat tombol kontrol Leaflet untuk kembali ke batas awal
                var resetButton = L.control({
                    position: 'topleft'
                });

                resetButton.onAdd = function(map) {
                    var button = L.DomUtil.create('button', 'leaflet-bar leaflet-control leaflet-control-custom');
                    // Tombol menggunakan SVG untuk ikon fokus (crosshairs)
                    button.innerHTML = `
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5"/>
                    </svg>
                `;

                    // Styling tombol menggunakan Tailwind CSS
                    button.classList.add(
                        'bg-blue-500', // Warna latar belakang biru
                        'text-white', // Teks putih (ikon)
                        'rounded-full', // Membuat tombol berbentuk lingkaran
                        'p-2', // Padding tombol
                        'cursor-pointer', // Menampilkan pointer saat hover
                        'hover:bg-blue-600' // Efek hover
                    );

                    // Event listener untuk tombol
                    button.onclick = function() {
                        map.fitBounds(geoJsonBounds); // Mengembalikan ke batas awal
                    };

                    return button;
                };

                // Tambahkan kontrol ke peta
                resetButton.addTo(map);
            });

        var markers = []; // simpan marker supaya bisa dihapus saat filter

        function renderMarkers() {
            // hapus marker lama
            markers.forEach(m => map.removeLayer(m));
            markers = [];

            var selectedKecamatan = document.getElementById("filter-kecamatan").value;
            var selectedJenis = Array.from(document.querySelectorAll(".filter-jenis:checked"))
                .map(cb => cb.value);

            lembaga.forEach(function(l) {
                if (!l.latitude || !l.longitude) return;

                // cek filter kecamatan & jenis
                if (selectedKecamatan && l.kecamatan !== selectedKecamatan) return;
                if (!selectedJenis.includes(l.jenis)) return;

                var marker = L.marker([l.latitude, l.longitude], {
                    icon: getIcon(l.jenis)
                }).bindPopup("<b>" + l.nama_lembaga + "</b><br>Jenis: " + l.jenis + "<br>Kec: " + l.kecamatan);

                marker.addTo(map);
                markers.push(marker);
            });
        }

        // render awal
        renderMarkers();

        // event listener filter
        document.getElementById("filter-kecamatan").addEventListener("change", renderMarkers);
        document.querySelectorAll(".filter-jenis").forEach(cb => {
            cb.addEventListener("change", renderMarkers);
        });
    </script>

</x-layout>
