<div class="p-5">
    <details class="group">
        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
            <x-persyaratan-title :title="$title" />
            <span class="transition group-open:rotate-180">
                <svg fill="none" height="25" shape-rendering="geometricPrecision" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" width="24">
                    <path d="M6 9l6 6 6-6"></path>
                </svg>
            </span>
        </summary>
        <p class="group-open:animate-fadeIn mt-3 text-white py-3">
            {{ $content }}
        </p>
    </details>
</div>
