<x-layout>
    <div class="w-full max-w-screen-xl flex flex-wrap flex-col items-center justify-between mx-auto md:flex-row px-6">
        {{-- Video Utama --}}
        <div class="">
            <!-- Mengambil judul video dari database -->
            <h1 class="text-lg font-bold text-gray-900 md:text-3xl mb-2 dark:text-blue-500">{{ $video->title }}</h1>
            <div class="">
                <div id="player" class="h-48 w-full aspect-video md:h-96"></div>
                <p>Video Duration: <span id="duration"></span></p>
                <p>Current Playtime: <span id="playtime"></span></p>
                <p>Phase Timer: <span id="timer"></span></p>
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
        </div>

        {{-- Daftar Video --}}
        <aside class="mt-3 border border-3 rounded-lg dark:border-blue-500">
            <h2 class="text-2xl font-bold m-4 dark:text-blue-500">Daftar Video</h2>
            <ul class="my-2 h-36 flex flex-row space-y-2 overflow-y-scroll md:flex-col md:h-96">
                <!-- Loop melalui semua video dari database dan tampilkan -->
                @foreach ($videos as $videoItem)
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
                            <a href="{{ url('/belajar', $videoItem->id) }}" class="text-blue-500">Lihat Video</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>

    <!-- Script untuk mengambil keyvideo dari Blade -->
    <script>
        const keyvideo = "{{ $video->keyvideo }}";
        const videoUrl = "https://www.youtube.com/watch?v=" + keyvideo;
    </script>
    <script src="{{ asset('js/module.js') }}"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
</x-layout>