let videoPlayer;
let phase = 1;
let countdownInterval;

function onYouTubeIframeAPIReady() {
    const videoUrl = "https://www.youtube.com/watch?v=F1QRZki3zb8"; // Replace with your YouTube video URL
    const videoId = getYouTubeId(videoUrl);

    videoPlayer = new YT.Player("player", {
        height: "360",
        width: "640",
        videoId: videoId,
        events: {
            onReady: onPlayerReady,
            onStateChange: onPlayerStateChange,
        },
    });
}

function onPlayerReady(event) {
    const player = event.target;
    const duration = player.getDuration();
    const formattedDuration = formatTime(duration);

    document.getElementById("duration").textContent = formattedDuration;
}

let playtimeInterval;
function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.PLAYING) {
        startPlaytimeTracker();
    } else if (
        event.data === YT.PlayerState.PAUSED ||
        event.data === YT.PlayerState.ENDED
    ) {
        stopPlaytimeTracker();
    }
}

function startPlaytimeTracker() {
    playtimeInterval = setInterval(function () {
        const currentTime = videoPlayer.getCurrentTime();
        const formattedPlaytime = formatTime(currentTime);
        document.getElementById("playtime").textContent = formattedPlaytime;
    }, 1000); // Update every second
}

function stopPlaytimeTracker() {
    clearInterval(playtimeInterval);
}

// Fungsi untuk memulai skenario dan countdown dengan menggunakan waktu awal yang disetel
function startScenario() {
    const initialTimer = getInitialTimer(); // Dapatkan waktu timer awal dari cookie

    if (initialTimer === 0) {
        alert("Waktu timer awal tidak ditemukan!");
        return;
    }

    if (phase === 1) {
        phase = 2;
        videoPlayer.playVideo(); // Start the video
    } else if (phase === 2) {
        phase = 1;
    }

    // Mulai countdown dengan waktu awal yang disetel
    countdown(initialTimer);

    // Sembunyikan popup "Start Scenario" setelah diklik
    hideStartScenarioPopup();
}

function continueToNextPhase() {
    hidePopup();
    isPopupClosed = true; // Set flag indicating popup was closed
}

// Tampilkan popup "Start Scenario" saat halaman dimuat
window.onload = function () {
    showStartScenarioPopup();
};

// Fungsi untuk menampilkan popup "Start Scenario"
function showStartScenarioPopup() {
    const startScenarioPopup = document.getElementById("startScenarioPopup");
    startScenarioPopup.style.display = "block";
}

// Fungsi untuk menyembunyikan popup "Start Scenario"
function hideStartScenarioPopup() {
    const startScenarioPopup = document.getElementById("startScenarioPopup");
    startScenarioPopup.style.display = "none";
}

// Fungsi untuk menampilkan popup untuk mengatur waktu timer awal
function showTimerPopup() {
    const timerPopup = document.getElementById("timerPopup");
    timerPopup.style.display = "block";
}

// Fungsi untuk menyembunyikan popup untuk mengatur waktu timer awal
function hideTimerPopup() {
    const timerPopup = document.getElementById("timerPopup");
    timerPopup.style.display = "none";
}

// Fungsi untuk mengatur waktu timer awal dan menyimpannya ke dalam cookie
function setInitialTimer() {
    const initialTimeInput = document.getElementById("initialTimerInput").value;
    if (!initialTimeInput) {
        alert("Masukkan waktu timer awal terlebih dahulu!");
        return;
    }

    // Simpan waktu timer awal ke dalam cookie dengan nama "initialTimer"
    document.cookie = `initialTimer=${initialTimeInput}; path=/`;

    alert("Waktu timer awal berhasil disimpan!");
    hideTimerPopup(); // Sembunyikan popup setelah waktu timer awal disimpan
}

// Fungsi untuk membaca waktu timer awal dari cookie
function getInitialTimer() {
    const initialTimerCookie = document.cookie
        .split("; ")
        .find((row) => row.startsWith("initialTimer="));
    if (!initialTimerCookie) {
        return 0; // Return 0 jika cookie tidak ditemukan
    }

    return parseInt(initialTimerCookie.split("=")[1]);
}

function countdown() {
    const initialTimer = getInitialTimer();
    if (initialTimer === 0) {
        alert("Waktu timer awal tidak ditemukan!");
        return;
    }

    let seconds = initialTimer;

    clearInterval(countdownInterval);
    countdownInterval = setInterval(function () {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;
        const formattedTime = `${minutes
            .toString()
            .padStart(2, "0")}:${remainingSeconds.toString().padStart(2, "0")}`;
        document.getElementById("timer").textContent = formattedTime;

        if (seconds === 0) {
            clearInterval(countdownInterval);
            if (phase === 2) {
                showPopup("Lakukanlah istirahat selama 1 menit");
            } else {
                showPopup("Istirahat sudah selesai, segera lanjutkan vidio");
            }
        }
        seconds--;
    }, 1000); // Update every second
}

function showPopup(message) {
    const popup = document.getElementById("popup");
    const popupMessage = document.getElementById("popupMessage");
    popupMessage.textContent = message;
    popup.style.display = "block";
    videoPlayer.pauseVideo(); // Pause video when popup is shown

    // Change background color when popup is shown
    if (phase === 2) {
        document.body.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
    }
}

function hidePopup() {
    const popup = document.getElementById("popup");
    popup.style.display = "none";
    startScenario(); // Start next phase when the popup is closed

    // Reset background color when popup is closed
    if (phase === 2) {
        document.body.style.backgroundColor = "#fff";
    }
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes.toString().padStart(2, "0")}:${remainingSeconds
        .toString()
        .padStart(2, "0")}`;
}

function getYouTubeId(url) {
    const regExp =
        /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    const match = url.match(regExp);

    if (match && match[2].length === 11) {
        return match[2];
    } else {
        return "error";
    }
}
