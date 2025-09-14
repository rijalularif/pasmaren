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
                    Ringkasan jumlah lembaga pendidikan.
                </p>
            </div>

            {{-- Cards grid --}}
            <div class="space-y-6 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:gap-6 md:space-y-0">
                @php
                    $jenisList = [
                        'PP' => ['color' => 'red', 'label' => 'Pondok Pesantren', 'icon' => '🏫'],
                        'RA' => ['color' => 'blue', 'label' => 'Raudhatul Athfal', 'icon' => '📘'],
                        'MI' => ['color' => 'emerald', 'label' => 'Madrasah Ibtidaiyah', 'icon' => '📗'],
                        'MTs' => ['color' => 'amber', 'label' => 'Madrasah Tsanawiyah', 'icon' => '📙'],
                        'MA' => ['color' => 'purple', 'label' => 'Madrasah Aliyah', 'icon' => '📕'],
                        'LPQ' => ['color' => 'sky', 'label' => 'Lembaga Pendidikan Qur’an', 'icon' => '📖'],
                        'MDT' => ['color' => 'green', 'label' => 'Madrasah Diniyah Takmiliyah', 'icon' => '📒'],
                    ];
                @endphp

                @foreach ($jenisList as $jenis => $data)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border-l-4 border-{{ $data['color'] }}-600 dark:border-{{ $data['color'] }}-500">
                        <div class="flex items-center justify-between mb-3">
                            <div
                                class="w-10 h-10 rounded-full bg-{{ $data['color'] }}-100 dark:bg-{{ $data['color'] }}-900 flex items-center justify-center text-lg">
                                {{ $data['icon'] }}
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">{{ $data['label'] }}</h3>
                        <p class="text-3xl font-extrabold text-gray-900 dark:text-white">
                            {{ $lembagaCounts[$jenis]->total ?? 0 }}
                        </p>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Jumlah lembaga {{ $jenis }}</p>
                    </div>
                @endforeach

                {{-- Total Semua --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border-l-4 border-indigo-600 dark:border-indigo-500">
                    <div class="flex items-center justify-between mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-lg">
                            📊
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Total Semua</h3>
                    <p class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        {{ $totalLembaga }}
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Jumlah seluruh lembaga</p>
                </div>
            </div>

        </div>

    </section>
</x-dash-layout>
