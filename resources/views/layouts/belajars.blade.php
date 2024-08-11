<x-layout>
    <h1 class="my-6 text-8xl font-bold text-center dark:text-white">CodeCycles</h1>

    <div class="max-w-screen-xl items-center justify-between space-y-4 my-4 mx-auto">
        <a href="" id="video-link" class="dark:text-white hover:text-orange-500 dark:hover:text-blue-500">
            <div
                class="mx-56 bg-white border border-orange-500 rounded-lg shadow dark:bg-gray-800 dark:border-blue-500 hover:bg-gray-100">
                <div class="flex flex-row w-full h-32 m-2 space-x-3">
                    <img id="thumbnail" src="" class="h-full" alt="Thumbnail" />
                    <div class="my-4">
                        <h1 id="video-title" class="text-4xl font-bold"></h1>
                    </div>
                </div>
            </div>
        </a>

        <div class="max-w-screen-xl items-center justify-between space-y-4 my-4 mx-auto">
            <div
                class="mx-56 bg-white border border-orange-500 rounded-lg shadow dark:bg-gray-800 dark:border-blue-500">
                <div class="w-full">
                    <ul class="grid grid-cols-5 gap-4 text-center m-6">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category.videos', $category->id) }}"
                                    class="h-28 block max-w-sm p-6 bg-white border border-orange-500 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-blue-500 dark:hover:bg-gray-700">
                                    <!-- You can replace this with icons or images related to the category if available -->
                                    <div class="h-14 mx-auto text-4xl">
                                        {{ substr($category->name, 0, 1) }}
                                    </div>
                                    <div class="font-bold text-xl mb-2 dark:text-white">{{ $category->name }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/lastwatched.js') }}"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
</x-layout>
