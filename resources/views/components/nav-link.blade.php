@props(['active' => false])

<a class="{{ $active ? 'bg-gray-900 dark:bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? " page" : false }}"="page" : false}}"" {{ $attributes }}>
    {{ $slot }}
</a>
