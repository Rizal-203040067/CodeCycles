<x-layout>
    <div
        class="w-full mt-6 max-w-screen-xl flex flex-wrap flex-col items-center justify-between mx-auto md:flex-row px-6">
        {{-- Video Utama --}}
        <div class="">
            @if ($video)
                <h1 class="text-lg font-bold text-gray-900 md:text-3xl mb-2 dark:text-blue-500">{{ $video->title }}</h1>
                <div class="">
                    <div id="player" class="h-48 w-full aspect-video md:h-96"></div>
                    {{-- bagian di bawah video player belajar.blade.php --}}
                    <div class="relative h-full">
                        <!-- Background -->
                        <div class="absolute inset-0 bg-blue-500 opacity-40"></div>
                        <!-- Text Layer -->
                        <div class="relative z-10 text-white flex flex-col space-y-2 p-4">
                            <p>Video Duration: <span id="duration"></span></p>
                            <div id="videoStatus">
                                <p id="completionStatus">Status video: </p>
                            </div>
                            <p>Current Playtime: <span id="playtime"></span></p>
                            <p>Progress: <span id="progress">0%</span></p>
                            <p>Phase Timer: <span id="timer"></span></p>
                        </div>
                    </div>
                </div>



                <!-- Popup for messages -->
                <div class="popup" id="popup">
                    <p id="popupMessage"></p>
                    <button onclick="hidePopup()">Close</button>
                </div>

                <!-- Button untuk menampilkan popup untuk mengatur waktu timer awal -->
                <div class="settimer">
                    <button onclick="showTimerPopup()">Set Initial Timer</button>
                </div>

                <!-- Popup untuk mengatur waktu timer awal -->
                <div class="popup" id="timerPopup">
                    <input type="text" id="initialTimerInput" placeholder="Masukkan waktu timer awal (detik)" />
                    <button onclick="setInitialTimer()">Set Timer</button>
                </div>

                <!-- Popup "Start Scenario" -->
                <div class="popup" id="startScenarioPopup">
                    <button onclick="startScenario()">Start Scenario</button>
                </div>

                <p>Elapsed Time: <span id="elapsedTime">00:00</span></p>
            @else
                <p class="text-lg font-bold text-gray-900 md:text-3xl mb-2 dark:text-blue-500">No video available.</p>
            @endif
        </div>


        {{-- Daftar Video Berdasarkan Kategori --}}
        <aside class="mt-3 w-96 border border-3 rounded-lg dark:border-blue-500">
            @if ($category)
                <h2 class="text-2xl font-bold m-4 dark:text-blue-500">{{ $category->name }}</h2>
                <ul
                    class="my-2 h-36 flex flex-row space-y-2 overflow-x-scroll overflow-y-hidden md:overflow-y-scroll md:overflow-x-hidden md:flex-col md:w-full md:h-96">
                    @foreach ($category->videos as $videoItem)
                        <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md dark:border-blue-500">
                            <div class="w-1/4 bg-green-600">
                                <div id="thumbnail-{{ $videoItem->id }}" class="w-24">
                                    <img src="https://img.youtube.com/vi/{{ $videoItem->keyvideo }}/0.jpg"
                                        alt="Thumbnail" />
                                </div>
                            </div>
                            <div class="w-3/4 text-white">
                                <h3 class="text-sm md:text-xl font-normal md:font-bold">{{ $videoItem->title }}</h3>
                                <p class="text-sm text-gray-400">Durasi: 7:54</p>
                                <a href="{{ route('category.videos', [$category->id, $videoItem->id]) }}"
                                    class="text-blue-500">Lihat Video</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </aside>
    </div>

    <!-- Script untuk mengambil keyvideo dari Blade -->
    @if ($video)
        <script>
            const keyvideo = "{{ $video->keyvideo }}";
            const videoUrl = "https://www.youtube.com/watch?v=" + keyvideo;
        </script>
    @endif
    <script src="{{ asset('js/module.js') }}"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
</x-layout>
