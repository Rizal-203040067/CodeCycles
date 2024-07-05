<x-layout>
    <div class=" max-w-screen-xl flex items-center justify-between mx-auto">
        {{-- Video Utama --}}
        <div class="m-6">
            <h1 class="text-lg font-bold text-gray-900 lg:text-3xl mb-2">Laravel 11</h1>
            <div class="">
                <div id="player" class="h-96 w-full aspect-video"></div>
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
        <div class="mx-2 mt-2 border border-3">
            <h2 class="text-2xl font-bold m-4">Daftar Video</h2>
            <ul class="h-96 space-y-4 overflow-y-scroll">
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit.</h3>
                        <p class="text-sm text-gray-400">7:54</p>
                    </div>
                </li>
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur.</h3>
                        <p class="text-sm text-gray-400">9:52</p>
                    </div>
                </li>
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur.</h3>
                        <p class="text-sm text-gray-400">9:52</p>
                    </div>
                </li>
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur.</h3>
                        <p class="text-sm text-gray-400">9:52</p>
                    </div>
                </li>
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur.</h3>
                        <p class="text-sm text-gray-400">9:52</p>
                    </div>
                </li>
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur.</h3>
                        <p class="text-sm text-gray-400">9:52</p>
                    </div>
                </li>
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur.</h3>
                        <p class="text-sm text-gray-400">9:52</p>
                    </div>
                </li>
                <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                    <div class="w-1/4">
                        <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                            class="w-full rounded-md">
                    </div>
                    <div class="w-3/4">
                        <h3 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur.</h3>
                        <p class="text-sm text-gray-400">9:52</p>
                    </div>
                </li>
                <!-- Tambahkan lebih banyak item video sesuai kebutuhan -->
            </ul>
        </div>
    </div>

    <script src="/js/module.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
</x-layout>
