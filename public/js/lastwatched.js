// Fungsi untuk mengambil keyvideo dan URL dari localStorage
function getVideoData() {
    const savedKeyVideo = localStorage.getItem("keyvideo");
    const savedPageUrl = localStorage.getItem("pageUrl");
    const savedVideoTitle = localStorage.getItem("videoTitle");

    return {
        keyvideo: savedKeyVideo,
        pageUrl: savedPageUrl,
        videoTitle: savedVideoTitle,
    };
}

window.onload = function () {
    const videoData = getVideoData();

    if (videoData.keyvideo && videoData.pageUrl && videoData.videoTitle) {
        // Perbarui href pada elemen <a> dengan URL halaman yang disimpan
        document.getElementById("video-link").href = videoData.pageUrl;

        // Perbarui src pada elemen <img> dengan thumbnail video yang sesuai
        document.getElementById("thumbnail").src =
            "https://img.youtube.com/vi/" + videoData.keyvideo + "/0.jpg";

        // Perbarui teks judul video
        document.getElementById("video-title").textContent =
            videoData.videoTitle;
    } else {
        document.getElementById("video-link").hidden = true;
    }
};
