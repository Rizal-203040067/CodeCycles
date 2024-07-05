<x-layout>
    <div class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row">
            <!-- Video Utama -->
            <div class="w-full md:w-2/3 p-4">
                <iframe id="main-video" class="w-full h-64 md:h-96" src="https://www.youtube.com/embed/HPOcLm0fMws"
                    frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Daftar Video -->
            <div class="w-full md:w-1/3 p-4">
                <h2 class="text-xl font-semibold mb-4">Daftar Video</h2>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-4 bg-gray-800 p-2 rounded-md">
                        <div class="w-1/4">
                            <img src="https://img.youtube.com/vi/videoid1/mqdefault.jpg" alt="Thumbnail"
                                class="w-full rounded-md">
                        </div>
                        <div class="w-3/4">
                            <h3 class="text-lg font-bold">1. Dasar Pemrograman dengan Javascript: INTRO</h3>
                            <p class="text-sm text-gray-400">7:54</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-4 bg-gray-800 p-2 rounded-md">
                        <div class="w-1/4">
                            <img src="https://img.youtube.com/vi/videoid2/mqdefault.jpg" alt="Thumbnail"
                                class="w-full rounded-md">
                        </div>
                        <div class="w-3/4">
                            <h3 class="text-lg font-bold">2. APA ITU PEMROGRAMAN?</h3>
                            <p class="text-sm text-gray-400">9:52</p>
                        </div>
                    </li>
                    <!-- Tambahkan lebih banyak item video sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var video = document.getElementById("main-video");

            video.addEventListener("click", function() {
                setTimeout(function() {
                    alert("Video sedang diputar!");
                }, 3000); // 3000 milidetik = 3 detik
            });
        });
    </script>
</x-layout>
