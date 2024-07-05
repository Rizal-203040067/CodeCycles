<!DOCTYPE html>
<html>

<head>
    <title>CodeCycles</title>
    <link rel="stylesheet" href="/css/style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

<body>

    <x-navbar></x-navbar>

    {{-- <x-header>{{ $title }}</x-header> --}}

    <main>
        {{ $slot }}
    </main>

    <x-footer></x-footer>

    <script src="/js/script.js"></script>
</body>

</html>
