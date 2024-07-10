<li class="{{ $active ? 'bg-white shadow-sm' : 'hover:bg-white' }} p-1 rounded my-1 lg:my-0">
    <a {{ $attributes }}
        class="{{ $active ? 'text-orange-500 lg:bg-transparent lg:p-0 lg:dark:text-blue-500' : 'text-white py-2 hover:bg-gray-100 lg:hover:bg-transparent hover:text-orange-500 lg:p-0 lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700' }} block py-2 px-3 text-center text-xl font-bold lg:text-base lg:font-medium"
        aria-current="{{ $active ? 'page' : false }}">{{ $slot }}
    </a>
</li>
