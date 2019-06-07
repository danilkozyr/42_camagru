(function() {

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');
    var vendorUrl = window.URL || window.WebKitURL;

    if (window.File && window.FileReader && window.FileList && window.Blob) {
        // alert('works');// Работает
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


    // form.addEventListener('submit', (data) => {
        // var name = "name=" + photo.currentSrc;


    //     var formData = new FormData();
    //     var xhr = new XMLHttpRequest();
        
    //     formData.append('name', photo.currentSrc);


    //     xhr.upload.onprogress = function(event) {
    //         console.log(`Uploaded ${event.loaded} of ${event.total}`);
    //     };
        
    //     xhr.onloadend = function() {
    //         if (xhr.status == 200) {
    //         console.log("success");
    //         } else {
    //         console.log("error " + this.status);
    //         }
    //     };


    //     xhr.open('POST', 'submit_photo.php');
    //     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    //     xhr.send(formData);
    // });
}) ();
