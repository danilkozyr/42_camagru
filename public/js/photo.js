(function() {

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');
    var vendorUrl = window.URL || window.WebKitURL;
    // const url = 'make_photo.php';
    const form = document.querySelector('form');

    // if (window.File && window.FileReader && window.FileList && window.Blob) {
    //     // alert('works');// Работает
    // } else {
    //     alert('File API не поддерживается данным браузером');
    // }


    // var str="hello";
    // console.log(str);


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
        // alert("To make photos - give the access to your webcam in browser settings");
    });

    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 600, 450);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
    });

    form.addEventListener('submit', e => {
        alert("hello");
    });


    // form.addEventListener('submit', e => {
    //     e.preventDefault()
    //     console.log(str); 
    // //     const file = document.querySelector('[id=photo]');
    // //     const formData = new FormData();
    // //     formData.append('file', file.currentSrc);
    // //     for (var value of formData.values()) {
    // //         console.log(value); 
    //     //  }
   
    //   })
    
}) ();
