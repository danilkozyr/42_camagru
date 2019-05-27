(function() {

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var vendorUrl = window.URL || window.WebKitURL;

    navigator.getMedia =    navigator.getUserMedia ||
                            navigator.WebKitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia;

    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.srcObject = stream;
        video.play();
    }, function(error) {
        // error.code
    });

    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 600, 450);
    });

}) ();