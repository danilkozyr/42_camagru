<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>

<?php $page_title = 'Camagru Home'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php if (isset($_FILES['files'])) { require_once(PRIVATE_PATH . "/img_func/push_images.php"); } ?>
<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['new'] = $_POST;
        $key = null;
        $default = "http://localhost:8100/public/images/default.png";
        foreach ($_SESSION['new'] as $k => $value) {
           $key = $k;
        }
        if (strcmp($value, $default) == 0) {
            echo "<script>alert('1')</script>";die;
        }
        try {
            $sql = "INSERT INTO images (image) VALUES (:img)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':img' =>   $value
            ]);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        header("Location: " . WWW_ROOT . "/pages/make_photo.php");
    }

    ?>


<script>
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

        xhr.open('POST', 'make_photo.php');
        xhr.send(formData);
    }
</script>

<table class="snap">
    <th>
        <table class ="snap">
            <th>
                <div class="booth">
                    <!-- <form method="post" action="make_photo.php" enctype="multipart/form-data"> -->
                    <!-- <form method="post" enctype="multipart/form-data" onsubmit="return false;"> -->
                    <form method="post" enctype="multipart/form-data">
                        <video id="video" width="600" height="450"></video>
                        <a href="#" id="capture" class="booth-button hello"><p class="text_custom">take photo</p></a>
                        <canvas id="canvas"  width="600" height="450"></canvas>
                        <img id="photo" src="../images/default.png" alt="default" width="600" name="file" height="450">

                        <label for="file_submit" class="booth-button hello"><p class="txt">submit photo</p></label><br>
                        <input id="file_submit" type="submit" class="hide" onclick="myFunction()">

                    </form>
                    <p class="txt no-margins">or</p>
                <div class="custom-file">
                    <form class="form1" action="make_photo.php" autocomplete="off" method="POST" enctype="multipart/form-data">    

                        <label for="file-upload" class="booth-button hello"><p class="txt">upload photo</p></label>
                        <input id="file-upload" type="file" onchange="this.form.submit()" name="files[]" multiple><br>
                    
                    </form>
                </div>
                </div>
            </th>
        </table>
    </th>
    <th>
        <?php require_once(PRIVATE_PATH . "/img_func/fetch_images.php") ?>
    </th>
</table>

<script src="../js/photo.js"></script>
<?php include(SHARED_PATH . '/footer.php'); ?>
