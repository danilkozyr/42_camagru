<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>

<?php $page_title = 'Camagru Home'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php if (isset($_FILES['files'])) { require_once(PRIVATE_PATH . "/img_func/push_images.php"); }
?>

<table class="snap">
    <th>
        <table class ="snap">
            <th>
                <div class="booth">
                    <!-- <form method="post" action="make_photo.php" enctype="multipart/form-data"> -->
                    <form method="post" enctype="multipart/form-data">
                        <video id="video" width="600" height="450"></video>
                        <a href="#" id="capture" class="booth-button"><p class="text_custom">take photo</p></a>
                        <canvas id="canvas"  width="600" height="450"></canvas>
                        <img id="photo" src="../images/default.png" alt="default" width="600" name="file" height="450">

                        <input type="submit" name="submit" class="booth-button hello"></a>
                    </form>
                </div>
            </th>
            <th>
                <div class="custom-file">
                    <form class="form1" action="make_photo.php" autocomplete="off" method="POST" enctype="multipart/form-data">    

                        <label for="file-upload" class="booth-button hello"><p class="txt">upload photo</p></label>
                        <input id="file-upload" type="file" onchange="this.form.submit()" name="files[]" multiple><br>
                    
                    </form>
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
