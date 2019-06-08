function myFunction()
{
    var xhr = new XMLHttpRequest();

    var formData = new FormData();
    formData.append('name', photo.currentSrc);
    
    xhr.upload.onprogress = function(event) {
        console.log(`Uploaded ${event.loaded} of ${event.total}`);
    };
    
    xhr.onloadend = function() {
        if (xhr.status == 200) {
            console.log("success");
        } else {
            console.log("error " + this.status);
        }
    };
    
    
    console.log(photo.currentSrc);

    xhr.open('POST', 'photo.php');
    xhr.send(formData);
}