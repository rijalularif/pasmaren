<nav class="bg-gray-800 dark:bg-gray-800/50" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-15" src="/icons/pasmaren.png" alt="Pasmaren" />
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300
                            hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        {{-- <x-nav-link href="/marens" :active="request()->is('marens')">Pesantren & Madrasah</x-nav-link> --}}
                        <x-nav-link href="/madrasah" :active="request()->is('madrasah')">Madrasah</x-nav-link>
                        <x-nav-link href="/pontren" :active="request()->is('pontren')">Pesantren</x-nav-link>
                    </div>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    @auth
                        <el-dropdown class="relative ml-3">
                            <button type="button" @click="isOpen=!isOpen"
                                class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                {{-- class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true"> --}}
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                
                                <img class="size-8 rounded-full outline -outline-offset-1 outline-white/10"
                                    src="/icons/avatar-svgrepo-com.png"
                                    alt="Male avatar">
                            </button>
                            <el-menu anchor="bottom end" popover
                                class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                                <a href=""
                                    class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">
                                    Hi, {{ auth()->user()->name }}
                                </a>
                                <a href="/dashboard"
                                    class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">
                                    My Dashboard
                                </a>
                                <form action="/logout" method="post" class="border-t border-gray-200">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">
                                        Logout
                                    </button>
                                </form>
                            </el-menu>
                        @else
                            <a href="/login"
                                class="text-gray-400 hover:text-indigo-600 {{ request()->is('login') ? 'font-bold' : '' }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </el-dropdown>
                    @endauth
                </div>
            </div>

            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen" command="--toggle" commandfor="mobile-menu"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>

                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu, show/hide based on menu state. --}}
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300
                    hover:bg-gray-700 hover:text-white" -->
            <x-nav-link-mobile href="/" :active="request()->is('/')">Home</x-nav-link-mobile>
            {{-- <x-nav-link-mobile href="/marens" :active="request()->is('marens')">Madrasah & Pesantren</x-nav-link-mobile> --}}
            <x-nav-link-mobile href="/madrasah" :active="request()->is('madrasah')">Madrasah</x-nav-link-mobile>
            <x-nav-link-mobile href="/pontren" :active="request()->is('pontren')">Pesantren</x-nav-link-mobile>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu" x-show="isOpen" x-transition>
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                @guest
                    <a href="/login"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->is('login') ? 'font-bold' : '' }}">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                @endguest
            </div>

            @auth
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img class="size-8 rounded-full outline -outline-offset-1 outline-white/10"
                                src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?... " alt="Avatar">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">{{ auth()->user()->name }}</div>
                            <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="/dashboard"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                            My Dashboard
                        </a>
                        <form action="/" method="post" class="border-t border-gray-200">
                            @csrf
                            <button type="submit"
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>


        {{-- <div class="border-t border-gray-700 pb-3 pt-4">
            @auth
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img class="size-8 rounded-full outline -outline-offset-1 outline-white/10"
                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Male avatar">
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="/dashboard"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                        My Dashboard
                    </a>
                    <form action="/logout" method="post" class="border-t border-gray-200">
                        @csrf
                        <button type="submit"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login"
                        class="
                        block rounded-md px-3 py-2 text-base font-medium 
                        text-gray-400 hover:bg-gray-700 hover:text-white {{ request()->is('login') ? 'font-bold' : '' }}">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                @endauth
            </div>
        </div> --}}
    </div>
</nav>
