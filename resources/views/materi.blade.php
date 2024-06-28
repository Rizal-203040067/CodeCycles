<!DOCTYPE html>
<html>
  <head>
    <title>CodeCycles</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div id="player"></div>
    <p>Video Duration: <span id="duration"></span></p>
    <p>Current Playtime: <span id="playtime"></span></p>
    <p>Phase Timer: <span id="timer"></span></p>

    <!-- Popup for messages -->
    <div class="popup" id="popup">
      <p id="popupMessage"></p>
      <button onclick="hidePopup()">Close</button>
    </div>

    <!-- Button untuk menampilkan popup untuk mengatur waktu timer awal -->
    <button onclick="showTimerPopup()">Set Initial Timer</button>

    <!-- Popup untuk mengatur waktu timer awal -->
    <div class="popup" id="timerPopup">
      <input
        type="text"
        id="initialTimerInput"
        placeholder="Masukkan waktu timer awal (detik)" />
      <button onclick="setInitialTimer()">Set Timer</button>
    </div>

    <!-- Popup "Start Scenario" -->
    <div class="popup" id="startScenarioPopup">
      <button onclick="startScenario()">Start Scenario</button>
    </div>

    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="/js/script.js"></script>
</body>
</html>
