<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article
        class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
        <header class="mb-4 lg:mb-6 not-format">
            <a href="/marens" class="font-medium text-xs  text-gray-500 dark:text-gray-400 hover:underline">
                &laquo; Back to all data
            </a>
            <address class="flex items-center my-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                    <img class="mr-4 w-16 h-16 rounded-full"
                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                        alt="{{ $maren->author->name }}">
                    <div>
                        <a href="/marens?author={{ $maren->author->username }}" rel="author"
                            class="text-xl font-bold text-gray-900 dark:text-white">
                            {{ $maren->author->name }}
                        </a>
                        <p class="text-base text-gray-500 dark:text-gray-400 mb-1">
                            {{ $maren->created_at->diffForHumans() }}
                        </p>
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <a href="/marens?kecamatan={{ $maren->kecamatan->slug }}">
                                <span
                                    class="bg-{{ $maren->kecamatan->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $maren->kecamatan->name }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </address>
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                {{ $maren->title }}
            </h1>
        </header>
        <p class="text-base text-gray-500 dark:text-gray-400">{{ $maren->body }}</p>
    </article>
</x-layout>
