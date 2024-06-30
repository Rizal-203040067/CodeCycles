<a {{ $attributes }}
    class="{{ $active ? 'text-white bg-blue-700 rounded lg:bg-transparent lg:text-blue-700 lg:p-0 lg:dark:text-blue-500' : 'text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700' }} block py-2 px-3 text-center"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}
</a>
