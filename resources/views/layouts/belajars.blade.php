<x-layout>
    <h1 class="my-6 text-8xl font-bold text-center dark:text-white">CodeCycles</h1>

    <div class="max-w-screen-xl items-center justify-between space-y-4 my-4 mx-auto">
        <a href="">
            <div
                class="mx-56 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="flex flex-row w-full h-32 m-2 space-x-3">
                    <img src="https://img.youtube.com/vi/T1TR-RGf2Pw/0.jpg" class="h-full" alt="Thumbnail" />
                    <div class="flex flex-col justify-between">
                        <h1 class="text-4xl font-bold dark:text-white">Belajar Laravel 11 | 1. Intro</h1>
                        <h2 class="text-3xl font-semibold dark:text-gray-400">Durasi: 7:54</h2>
                    </div>
                </div>
            </div>
        </a>

        <div class="max-w-screen-xl items-center justify-between space-y-4 my-4 mx-auto">
            <div class="mx-56 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="w-full">
                    <ul class="grid grid-cols-6 gap-4 text-center m-6">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category.videos', $category->id) }}"
                                    class="h-28 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <!-- You can replace this with icons or images related to the category if available -->
                                    <div class="h-14 mx-auto text-4xl">
                                        {{ substr($category->name, 0, 1) }}
                                    </div>
                                    <div class="font-bold text-xl mb-2">{{ $category->name }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.youtube.com/iframe_api"></script>
</x-layout>
