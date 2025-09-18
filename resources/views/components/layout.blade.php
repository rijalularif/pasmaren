<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 dark:bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/icons/pasmaren.png">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    @vite('resources/css/app.css')
    <script defer="defer" src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <x-header>{{ $title }}</x-header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="mx-auto max-w-screen-xl px-6 py-8 lg:py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Pasmaren</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Sistem Informasi Madrasah & Pesantren Kab.
                        Pasaman</p>

                    <a href="https://drive.google.com/your-file-id/view" target="_blank" rel="noopener noreferrer">
                        <h2
                            class="text-lg font-semibold text-gray-800 dark:text-white mt-4 hover:underline cursor-pointer">
                            Panduan
                        </h2>
                    </a>
                </div>

                <!-- Navigation -->
                <div class="flex flex-col space-y-2">
                    <h3 class="text-sm font-semibold text-gray-700 uppercase dark:text-gray-300">Menu</h3>
                    <a href="/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Home</a>
                    <a href="/madrasah" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Madrasah</a>
                    <a href="/pontren" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Pesantren</a>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase dark:text-gray-300">Follow Me</h3>
                    <div class="flex mt-2 space-x-6">
                        <a href="https://www.instagram.com/kemenag_pasaman/"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Instagram</a>
                        <a href="https://pasaman.kemenag.go.id/" class="text-gray-500 hover:text-blue-600">Website</a>
                    </div>

                    <h3 class="text-sm font-semibold text-gray-700 uppercase dark:text-gray-300 mt-3.5">Alamat</h3>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Jl. Jenderal Sudirman No.98 B Lubuk
                        Sikaping Kab. Pasaman Prov. Sumatera Barat</p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-8 text-center text-sm text-gray-500 dark:text-gray-400">
                © <a href="https://rijalularif.github.io/" class="hover:underline">Rijalul Arif</a>. All Rights
                Reserved.
            </div>
        </div>
    </footer>


</body>

</html>
