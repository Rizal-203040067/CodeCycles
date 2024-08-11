<x-layout>
    <div
        class="w-full mt-6 max-w-screen-xl flex flex-wrap flex-col items-center justify-between mx-auto md:flex-row px-6">
        {{-- Video Utama --}}
        <div id="videoContainer">
            @if ($video)
                <h1 id="video-title"
                    class="text-lg font-bold underline text-orange-500 md:text-3xl mb-2 dark:text-blue-500">
                    {{ $video->title }}
                </h1>
                <div class="">
                    <div id="player" class="h-48 w-full aspect-video md:h-96"></div>
                    {{-- bagian di bawah video player --}}
                    <div class="relative h-full">
                        <!-- Background -->
                        <div class="absolute inset-0 bg-orange-500 dark:bg-blue-500"></div>
                        <!-- Text Layer -->
                        <div class="relative z-10 text-white flex flex-col space-y-2 p-4">
                            <p>Video Duration: <span id="duration"></span></p>
                            <div id="videoStatus">
                                <p>Status video: <span id="completionStatus"></span></p>
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
                    <button
                        class="mt-2 p-2 text-white rounded-lg button shadow-sm bg-orange-500 hover:bg-orange-700 dark:bg-blue-500 hover:dark:bg-blue-700"
                        onclick="hidePopup()">Close</button>
                </div>

                <!-- Button untuk menampilkan popup untuk mengatur waktu timer awal -->
                <div class="settimer">
                    <button
                        class="mt-2 p-2 text-white rounded-lg button shadow-sm bg-orange-500 hover:bg-orange-700 dark:bg-blue-500 hover:dark:bg-blue-700"
                        onclick="showTimerPopup()">Set Timer</button>
                </div>

                <!-- Popup untuk mengatur waktu timer awal -->
                <div class="popup" id="timerPopup">
                    <input type="text" id="initialTimerInput" placeholder="Masukkan waktu timer awal (detik)" />
                    <button
                        class="mt-2 p-2 text-white rounded-lg button shadow-sm bg-orange-500 hover:bg-orange-700 dark:bg-blue-500 hover:dark:bg-blue-700"
                        onclick="setInitialTimer()">Set Timer</button>
                </div>

                <!-- Popup "Start Scenario" -->
                <div class="popup" id="startScenarioPopup">
                    <p>Selamat Belajar</p>
                    <button
                        class="mt-2 p-2 text-white rounded-lg button shadow-sm bg-orange-500 hover:bg-orange-700 dark:bg-blue-500 hover:dark:bg-blue-700"
                        onclick="startScenario()">Start Scenario</button>
                </div>

                {{-- <p>Elapsed Time: <span id="elapsedTime">00:00</span></p> --}}
            @else
                <p class="text-lg font-bold text-gray-900 md:text-3xl mb-2 dark:text-blue-500">No video available.</p>
            @endif
        </div>

        {{-- Kuis --}}
        <div id="quizContainer" class="hidden">
            <h2 class="text-2xl font-bold text-orange-500 md:text-3xl mb-2 dark:text-blue-500">Kuis</h2>
            <form id="quizForm">
                @foreach ($video->quizzes as $quiz)
                    <div class="mb-4">
                        <label class="block dark:text-white text-sm font-bold mb-2" for="question{{ $quiz->id }}">
                            {{ $quiz->question }}
                        </label>
                        @foreach ($quiz->options as $option)
                            <div>
                                <input type="radio" id="q{{ $quiz->id }}{{ $option->id }}"
                                    name="question{{ $quiz->id }}" value="{{ $option->option }}"
                                    @if ($option->option == $quiz->correct_answer) data-correct="true" @endif>
                                <label for="q{{ $quiz->id }}{{ $option->id }}">{{ $option->option }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <button type="submit"
                    class="text-white bg-orange-500 hover:bg-orange-700 font-bold py-2 px-4 rounded dark:bg-blue-500 dark:hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </form>
        </div>

        {{-- Daftar Video Berdasarkan Kategori --}}
        <aside class="mt-3 w-96 border border-3 border-orange-500 rounded-lg dark:border-blue-500">
            @if ($category)
                <h2 class="text-2xl font-bold m-4 dark:text-white">{{ $category->name }}</h2>
                <ul
                    class="my-2 h-36 flex flex-row space-y-2 overflow-x-scroll overflow-y-hidden md:overflow-y-scroll md:overflow-x-hidden md:flex-col md:w-full md:h-96">
                    @foreach ($category->videos as $videoItem)
                        <li class="border mx-2 flex items-center space-x-4 p-2 rounded-md">
                            <div class="w-1/4 bg-green-600">
                                <div id="thumbnail-{{ $videoItem->id }}" class="w-24">
                                    <img src="https://img.youtube.com/vi/{{ $videoItem->keyvideo }}/0.jpg"
                                        alt="Thumbnail" />
                                </div>
                            </div>
                            <div class="w-3/4">
                                <h3
                                    class="text-sm underline hover:text-orange-500 md:text-xl font-normal md:font-bold dark:text-white dark:hover:text-blue-500">
                                    <a
                                        href="{{ route('category.videos', [$category->id, $videoItem->id]) }}">{{ $videoItem->title }}</a>
                                </h3>
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
    {{-- <script src="{{ asset('js/module2.js') }}"></script> --}}
    <script src="https://www.youtube.com/iframe_api"></script>
</x-layout>
