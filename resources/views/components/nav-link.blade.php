<li
    class="{{ $active ? 'bg-white shadow-sm' : 'hover:border hover:border-1 dark:hover:text-blue-500' }} rounded my-1 md:my-0">
    <a {{ $attributes }}
        class="{{ $active ? 'text-orange-500 bg-transparent dark:text-blue-500' : 'hover:bg-transparent dark:hover:text-blue-500 dark:hover:bg-transparent dark:border-gray-700' }} block py-0 px-0 md:py-2 md:px-3 text-center"
        aria-current="{{ $active ? 'page' : false }}">{{ $slot }}
    </a>
</li>
