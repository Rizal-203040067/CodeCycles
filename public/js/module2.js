let videoPlayer;
let timerInterval;
let countdownInterval;
let phase = 1;
let playtimeInterval;
let duration;
let elapsedTime = 0; // in seconds
let isTimerRunning = false;
const PROGRESS_KEY = 'videoProgress_' + keyvideo; // Unique key for this video
let lastSavedProgress = 0; // Keep track of the last saved progress

function onYouTubeIframeAPIReady() {
    const videoUrl = "https://www.youtube.com/watch?v=" + keyvideo;
    const videoId = getYouTubeId(videoUrl);

    videoPlayer = new YT.Player("player", {
        videoId: videoId,
        events: {
            onReady: onPlayerReady,
            onStateChange: onPlayerStateChange,
        },
    });
}

function onPlayerReady(event) {
    const player = event.target;
    duration = player.getDuration();
    const formattedDuration = formatTime(duration);

    // Load saved progress from local storage
    const savedProgress = localStorage.getItem(PROGRESS_KEY);
    if (savedProgress) {
        elapsedTime = parseFloat(savedProgress);
        player.seekTo(elapsedTime);
        lastSavedProgress = elapsedTime; // Set last saved progress
    }

    document.getElementById("duration").textContent = formattedDuration;
}

function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.PLAYING) {
        startPlaytimeTracker();
        if (!isTimerRunning) {
            startTimer(); // Start the timer when the video starts playing for the first time
        }
    } else if (
        event.data === YT.PlayerState.PAUSED ||
        event.data === YT.PlayerState.ENDED
    ) {
        stopPlaytimeTracker();
    }
}

function saveProgress(currentTime) {
    localStorage.setItem(PROGRESS_KEY, currentTime);
}

function startPlaytimeTracker() {
    playtimeInterval = setInterval(function () {
        const currentTime = videoPlayer.getCurrentTime();
        const formattedPlaytime = formatTime(currentTime);
        document.getElementById("playtime").textContent = formattedPlaytime;

        // Update progress only if video is moving forward
        if (currentTime > lastSavedProgress) {
            lastSavedProgress = currentTime;
            saveProgress(currentTime);
        }

        // Menghitung progress dengan toleransi 1 detik
        const progress = ((lastSavedProgress + 1) / duration) * 100;
        document.getElementById("progress").textContent = `${progress.toFixed(2)}%`;

        // Tampilkan popup jika progress mencapai 100%
        if (progress >= 100) {
            markVideoAsCompleted(); // Menandai video sebagai selesai
            showPopup("Silahkan lanjut ke video berikutnya");
            stopTimer(); // Hentikan timer ketika progress mencapai 100%
            clearInterval(playtimeInterval);
        }
    }, 1000); // Update every second
}


function stopPlaytimeTracker() {
    clearInterval(playtimeInterval);
}

function startTimer() {
    startTime = new Date();
    isTimerRunning = true;
    timerInterval = setInterval(function () {
        elapsedTime++;
        document.getElementById("elapsedTime").textContent =
            formatTime(elapsedTime);
    }, 1000); // Update every second
}

function stopTimer() {
    clearInterval(timerInterval);
    isTimerRunning = false;
}

function saveProgress(currentTime) {
    localStorage.setItem(PROGRESS_KEY, currentTime);
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds % 60);
    return `${minutes.toString().padStart(2, "0")}:${remainingSeconds
        .toString()
        .padStart(2, "0")}`;
}

function showPopup(message) {
    const popup = document.getElementById("popup");
    const popupMessage = document.getElementById("popupMessage");
    popupMessage.textContent = message;
    popup.style.display = "block";
    videoPlayer.pauseVideo(); // Pause video when popup is shown

    // Change background color when popup is shown
    if (phase === 2) {
        document.getElementById("rest").hidden = false;
    }
}

function hidePopup() {
    const popup = document.getElementById("popup");
    popup.style.display = "none";
    startScenario(); // Start next phase when the popup is closed

    // Reset background color when popup is closed
    if (phase === 2) {
        document.getElementById("rest").hidden = true;
    }
}

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

function checkVideoCompletion() {
    const videoCompleted = localStorage.getItem('videoCompleted_' + keyvideo);
    if (videoCompleted === 'true') {
        document.getElementById("completionStatus").textContent = "Video ini sudah 100% selesai!";
        // Atau tambahkan gaya CSS untuk menandai video sebagai selesai
        document.getElementById("videoStatus").classList.add("completed");
    } else {
        document.getElementById("completionStatus").textContent = "Video ini belum selesai.";
    }
}

window.onload = function () {
    showStartScenarioPopup();
    checkVideoCompletion(); // Cek status completion saat halaman dimuat
};
// // Tampilkan popup "Start Scenario" saat halaman dimuat
// window.onload = function () {
//     showStartScenarioPopup();
// };

function showStartScenarioPopup() {
    const startScenarioPopup = document.getElementById("startScenarioPopup");
    startScenarioPopup.style.display = "block";
}

function hideStartScenarioPopup() {
    const startScenarioPopup = document.getElementById("startScenarioPopup");
    startScenarioPopup.style.display = "none";
}

function showTimerPopup() {
    const timerPopup = document.getElementById("timerPopup");
    timerPopup.style.display = "block";
}

function hideTimerPopup() {
    const timerPopup = document.getElementById("timerPopup");
    timerPopup.style.display = "none";
}

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

function getYouTubeId(url) {
    const regex =
        /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    const matches = url.match(regex);
    return matches ? matches[1] : null;
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds % 60);
    return `${minutes.toString().padStart(2, "0")}:${remainingSeconds
        .toString()
        .padStart(2, "0")}`;
}


// Fungsi video complite
function markVideoAsCompleted() {
    localStorage.setItem('videoCompleted_' + keyvideo, 'true');
}