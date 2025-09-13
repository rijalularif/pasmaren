<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('success'))
        <div id="alert-success"
            class="flex items-center justify-between mb-4 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3 text-sm font-medium shadow-sm transition-opacity duration-500"
            role="alert">
            <span>{{ session('success') }}</span>
            <button type="button" onclick="document.getElementById('alert-success').remove()"
                class="text-green-600 hover:text-green-800">
                ✖
            </button>
        </div>
    @endif

    @if (session()->has('loginError'))
        <div id="alert-error"
            class="flex items-center justify-between mb-4 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3 text-sm font-medium shadow-sm transition-opacity duration-500"
            role="alert">
            <span>{{ session('loginError') }}</span>
            <button type="button" onclick="document.getElementById('alert-error').remove()"
                class="text-red-600 hover:text-red-800">
                ✖
            </button>
        </div>
    @endif

    <script>
        // Auto hide setelah 2 detik
        setTimeout(() => {
            const alertSuccess = document.getElementById('alert-success');
            if (alertSuccess) {
                alertSuccess.classList.add('opacity-0');
                setTimeout(() => alertSuccess.remove(), 500);
            }

            const alertError = document.getElementById('alert-error');
            if (alertError) {
                alertError.classList.add('opacity-0');
                setTimeout(() => alertError.remove(), 500);
            }
        }, 2000);
    </script>

    <div class="flex flex-col items-center justify-between px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/login" method="post">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                            placeholder="name@company.com" autofocus="autofocus" required="required"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="required">
                    </div>
                    <div class="flex items-center justify-between">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Sign
                    in
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet?
                        <a href="/register"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                            Sign up
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>
