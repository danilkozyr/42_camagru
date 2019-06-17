function upload() {
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    
    var file    = document.getElementById('file_upload').files[0]; //sames as here
    var reader  = new FileReader();
    
    var img = new Image();
    
    if (file) {
        reader.readAsDataURL(file);    
    }
    
    reader.onloadend = function () {
        img.src = reader.result;
        
        setTimeout(() => {
            context.drawImage(img, 0, 0, 600, 450);
            photo.setAttribute('src', canvas.toDataURL('image/png'));
        }, 300);

    }

}
