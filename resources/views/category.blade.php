{{-- <x-layout>
    <div
        class="w-full mt-6 max-w-screen-xl flex flex-wrap flex-col items-center justify-between mx-auto md:flex-row px-6">
        <h1 class="text-3xl font-bold mb-6">Kategori: {{ $category->name }}</h1>
        <ul class="w-full">
            @foreach ($category->videos as $video)
                <li class="mb-4 border p-4 rounded-md">
                    <div class="flex items-center">
                        <div class="w-1/4">
                            <img src="https://img.youtube.com/vi/{{ $video->keyvideo }}/0.jpg" alt="{{ $video->title }}"
                                class="w-full h-auto rounded-md">
                        </div>
                        <div class="w-3/4 pl-4">
                            <h2 class="text-2xl font-bold">{{ $video->title }}</h2>
                            <a href="{{ route('belajar', $video->id) }}"
                                class="text-blue-500 hover:underline mt-2 block">Lihat Video</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout> --}}
