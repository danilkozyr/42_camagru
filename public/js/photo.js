(function() {

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');
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
        alert("To make photos - give the access to your webcam in browser settings");
    });

    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 600, 450);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
        // var comp = document.getElementById
    });
    
    document.getElementById('save').addEventListener('click', function() {
        var path = document.getElementById('photo').currentSrc; 
        if (path === "http://localhost:8100/cam/public/images/default.png") {
            alert("In order to save photo, shoot a photo please");
        } else {
            var path = path.replace('data:image/png;base64,', '');
            window.location.href = "make_photo?action=" + path;
            // var date = new Date();
            // date.setTime(date.getTime() + (10 *60 * 1000));
            // var expires = "; expires="+date.toGMTString();
            // var expires = "; expires=Thu, 18 Dec 2020 12:00:00 UTC;";
            // console.log(path);

            // var cookie = "path=";
            // cookie += path;
            // cookie += expires;
            // console.log(cookie);

            // if (document.cookie = cookie)
            //     console.log("success");
            // else
            //     console.log("fail");

        }
        
    });

}) ();


function createCookie(name, value, seconds) {
    var expires;
    if (seconds) {
      var date = new Date();
      date.setTime(date.getTime() + (seconds * 1000));
      expires = "; expires=" + date.toGMTString();
    } else {
     expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
  }