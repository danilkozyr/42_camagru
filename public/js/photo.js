(function() {

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');
    var vendorUrl = window.URL || window.WebKitURL;

    if (window.File && window.FileReader && window.FileList && window.Blob) {

    } else {
        alert('File API не поддерживается данным браузером');
    }

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
        alert("To make photos - give the access to your webcam in browser settings");
    });

    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 600, 450);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
    });

}) ();

const rand = (min, max) => {
    return Math.random() * (max - min) + min;
 }

function putMask(id) {
    var mask = document.getElementById('mask');
    var context = canvas.getContext('2d');
    var newSrc = mask.currentSrc.split("8100");
    var res = newSrc[1].substr(0, newSrc[1].length - 6);
    if (id > 9) {
        var src = res.concat(id, ".png");
    } else {
        var src = res.concat("0", id, ".png");
    }
    var img = new Image();
    img.src = src;
    context.drawImage(img, rand(0, 500), rand(0, 350), 100,100);
    photo.setAttribute('src', canvas.toDataURL('image/png'));

}