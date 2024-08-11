let videoPlayer;
let timerInterval;
let countdownInterval;
let phase = 1;
let playtimeInterval;
let duration;
let elapsedTime = 0; // in seconds
let isTimerRunning = false;
const PROGRESS_KEY = "videoProgress_" + keyvideo; // Unique key for this video
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

    if (event.data === YT.PlayerState.ENDED) {
        showPopup("Video telah selesai diputar.");
        document.getElementById("completionStatus").textContent =
            "Status video: Selesai";
        markVideoAsCompleted();
        showQuiz();
    }
}

function startPlaytimeTracker() {
    playtimeInterval = setInterval(function () {
        const currentTime = videoPlayer.getCurrentTime();
        const formattedCurrentTime = formatTime(currentTime);
        const progress = (currentTime / duration) * 100;

        document.getElementById("playtime").textContent = formattedCurrentTime;
        document.getElementById("progress").textContent =
            progress.toFixed(2) + "%";
        elapsedTime = currentTime; // Update elapsed time

        // Save progress to local storage every 5 seconds
        if (currentTime - lastSavedProgress >= 5) {
            localStorage.setItem(PROGRESS_KEY, currentTime);
            lastSavedProgress = currentTime;
        }

        // Cek apakah video selesai
        if (currentTime >= duration) {
            markVideoAsCompleted(); // Panggil fungsi ketika video selesai
        }
    }, 1000);
}

function stopPlaytimeTracker() {
    clearInterval(playtimeInterval);
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds % 60);
    return `${minutes.toString().padStart(2, "0")}:${remainingSeconds
        .toString()
        .padStart(2, "0")}`;
}

function getYouTubeId(url) {
    const regExp =
        /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    const match = url.match(regExp);
    return match && match[7].length === 11 ? match[7] : null;
}

// Function to show a popup message
function showPopup(message) {
    const popup = document.getElementById("popup");
    const popupMessage = document.getElementById("popupMessage");
    popupMessage.textContent = message;
    popup.style.display = "block";
}

function hidePopup() {
    const popup = document.getElementById("popup");
    popup.style.display = "none";
}

// Function to start the timer
function startTimer() {
    const phaseTimer = document.getElementById("timer");
    let remainingTime = 5; // 2 minutes in seconds

    isTimerRunning = true;

    countdownInterval = setInterval(() => {
        if (remainingTime > 0) {
            remainingTime--;
            phaseTimer.textContent = formatTime(remainingTime);
        } else {
            clearInterval(countdownInterval);
            phase++;
            startNextPhase();
        }
    }, 1000);
}

function startScenario() {
    phase = 1;
    startTimer();
}

function startNextPhase() {
    switch (phase) {
        case 1:
            startPhase1();
            break;
        case 2:
            startPhase2();
            break;
    }
}

function showTimerPopup() {
    const timerPopup = document.getElementById("timerPopup");
    timerPopup.style.display = "block";
}

function setInitialTimer() {
    const initialTimeInput = document.getElementById("initialTimerInput").value;
    const phaseTimer = document.getElementById("timer");
    phaseTimer.textContent = formatTime(initialTimeInput);
    hidePopup();
}

function startPhase1() {
    showPopup("Phase 1: Watch the video carefully.");
    setTimeout(() => {
        hidePopup();
        startTimer(); // Start timer for the next phase
    }, 5000);
}

function startPhase2() {
    showPopup("Phase 2: Pay attention to the details.");
    setTimeout(() => {
        hidePopup();
        startTimer(); // Start timer for the next phase
    }, 5000);
}

function showQuiz() {
    const quizContainer = document.getElementById("quizContainer");
    quizContainer.style.display = "block";
}

function markVideoAsCompleted() {
    const completionStatus = document.getElementById("completionStatus");
    completionStatus.textContent = "Status video: Selesai";
}

const quizForm = document.getElementById("quizForm");
if (quizForm) {
    quizForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(quizForm);
        let correctAnswers = 0;

        for (let [questionId, answer] of formData.entries()) {
            // Cari elemen input yang benar
            const correctAnswerElement = document.querySelector(
                `input[name="${questionId}"][data-correct="true"]`
            );

            // Periksa apakah jawaban pengguna sama dengan jawaban yang benar
            if (correctAnswerElement && correctAnswerElement.value === answer) {
                correctAnswers++;
            }
        }

        showPopup(`You answered ${correctAnswers} questions correctly.`);
    });
}
