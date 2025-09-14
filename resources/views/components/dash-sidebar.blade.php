<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidenav">
    <div
        class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <ul class="space-y-2">
            <li>
                <a href="/dashboard"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm0 8v6h7v-6H4Zm16 6h-7v-6h7v6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('dashboard/marens*') ? 'active' : '' }}">
                <a href="/"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="m7.14284 11 4.99996-6 5 6m-9.99996 0h-3v8H20.1428v-8h-3m-9.99996 0H3.14285l3-4h4.33735l-3.33736 4Zm9.99996 0h4l-3-4h-4.3374l3.3374 4Zm-3 2c0 1.1046-.8954 2-2 2-1.1045 0-2-.8954-2-2s.8955-2 2-2c1.1046 0 2 .8954 2 2Z" />
                    </svg>

                    <span class="ml-3">Home Page</span>
                </a>
            </li>

            {{-- <li class="nav-item {{ Request::is('dashboard/pontrens*') ? 'active' : '' }}">
                <a href="/dashboard/pontrens"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="m7.14284 11 4.99996-6 5 6m-9.99996 0h-3v8H20.1428v-8h-3m-9.99996 0H3.14285l3-4h4.33735l-3.33736 4Zm9.99996 0h4l-3-4h-4.3374l3.3374 4Zm-3 2c0 1.1046-.8954 2-2 2-1.1045 0-2-.8954-2-2s.8955-2 2-2c1.1046 0 2 .8954 2 2Z" />
                    </svg>

                    <span class="ml-3">Pondok Pesantren</span>
                </a>
            </li> --}}
        </ul>

        {{-- @can('admin') --}}
        {{-- <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li class="nav-item {{ Request::is('dashboard/kecamatans*') ? 'active' : '' }}">
                <a href="/dashboard/kecamatans"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-3">Data Kecamatan</span>
                </a>
            </li>
        </ul> --}}

        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li class="nav-item {{ Request::is('dashboard/lembagas*') ? 'active' : '' }}">
                <a href="/dashboard/lembagas"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-3">Data Lembaga</span>
                </a>
            </li>
        </ul>
        {{-- @endcan --}}
    </div>


<div
    class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex
           bg-white dark:bg-gray-800 z-20 border-r border-gray-200 dark:border-gray-700">

    {{-- Logout --}}
    <form id="logout-form" action="/logout" method="POST" class="inline-flex">
        @csrf
        <button type="button" id="btn-logout" data-tooltip-target="tooltip-logout"
            class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer
                   hover:text-gray-900 hover:bg-gray-100
                   dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600
                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 dark:focus:ring-gray-600">
            {{-- icon logout --}}
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M16 17v1a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v1"/>
                <path d="M7 12h10m0 0l-3-3m3 3l-3 3"/>
            </svg>
            <span class="sr-only">Logout</span>
        </button>
    </form>
    <div id="tooltip-logout" role="tooltip"
         class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
        Logout
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>

{{-- Modal Konfirmasi Logout --}}
<div id="logout-modal"
     class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/40 p-4">
    <div class="w-full max-w-md rounded-xl bg-white dark:bg-gray-800 shadow-lg">
        <div class="p-6">
            <div class="flex items-start gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="h-5 w-5 text-red-600 dark:text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.72-1.36 3.485 0l6.518 11.6A2 2 0 0116.518 18H3.482a2 2 0 01-1.742-3.301l6.517-11.6zM11 14a1 1 0 10-2 0 1 1 0 002 0zm-1-2a1 1 0 01-1-1V7a1 1 0 112 0v4a1 1 0 01-1 1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Konfirmasi Logout</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                        Anda yakin ingin keluar dari website?
                    </p>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button type="button" id="logout-cancel"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm
                               hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">
                    Batal
                </button>
                <button type="button" id="logout-confirm"
                        class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white
                               hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                    Logout
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const btnLogout   = document.getElementById('btn-logout');
    const modal       = document.getElementById('logout-modal');
    const btnCancel   = document.getElementById('logout-cancel');
    const btnConfirm  = document.getElementById('logout-confirm');
    const formLogout  = document.getElementById('logout-form');

    function openModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    btnLogout?.addEventListener('click', (e) => {
        e.preventDefault();
        openModal();
    });
    btnCancel?.addEventListener('click', closeModal);
    modal?.addEventListener('click', (e) => {
        if (e.target === modal) closeModal(); // klik backdrop = tutup
    });
    btnConfirm?.addEventListener('click', () => formLogout?.submit());
</script>

{{-- Fallback super-ringkas (kalau mau tanpa modal):
<form ... onsubmit="return confirm('Yakin logout?')"> --}}


</aside>
