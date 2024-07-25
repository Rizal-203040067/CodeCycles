<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CodeCycles</title>
    <link rel="stylesheet" href="/css/style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- Dark Mode --}}
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-white dark:bg-gray-800">
    <div id="rest" hidden></div>

    <x-navbar></x-navbar>

    {{-- <x-header>{{ $title }}</x-header> --}}

    <main>
        {{ $slot }}
    </main>

    <x-footer></x-footer>

    @livewireScripts
    <script src="/js/script.js"></script>
</body>

</html>
