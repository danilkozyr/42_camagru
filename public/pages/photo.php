<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>

<?php $page_title = 'Camagru Home'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php if (isset($_FILES['files'])) { require_once(PRIVATE_PATH . "/img_func/push_images.php"); } ?>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['Delete']) || isset($_POST['Post'])) { 
        require_once(PRIVATE_PATH . "/img_func/image_actions.php");
    } else {
        require_once(PRIVATE_PATH . "/img_func/push_images_to_gallery.php"); 
    } 
} ?>


<script src="../js/send_img_info.js"></script>

<table class="snap">
    <th>
        <table class ="snap">
            <th>
                <div class="booth">
                    <form method="post" enctype="multipart/form-data">
                        <video id="video" width="600" height="450"></video>
                        <a href="#" id="capture" class="booth-button hello"><p class="text_custom">take photo</p></a>
                        <canvas id="canvas"  width="600" height="450"></canvas>
                        <img id="photo" src="../images/default.png" alt="default" width="600" name="file" height="450">

                        <label for="file_submit" class="booth-button hello"><p class="txt">submit photo</p></label><br>
                        <input id="file_submit" type="submit" value="add_photo" class="hide" onclick="myFunction()">

                    </form>
                    <p class="txt no-margins">or</p>
                <div class="custom-file">
                    <form class="form1" action="photo.php" autocomplete="off" method="POST" enctype="multipart/form-data">    

                        <label for="file-upload" class="booth-button hello"><p class="txt">upload photo</p></label>
                        <input id="file-upload" type="file" onchange="this.form.submit()" name="files[]" multiple><br>
                    
                    </form>
                </div>
                </div>
            </th>
            <th>
                <div style="overflow:auto; height:1253px;">

                <?php 
                    $images = glob("../images/stickers/*.png");
                    echo '<ul class="stickers-list-basic">';
                    foreach($images as $image) {
                        echo '<li>';
                        echo '<img class="stickers" src="'.$image.'" />';
                        echo '<form action="" method="post">
                        <input type="hidden" name="id" value="'.$image['id'].'">
                        <input class="stickers-list-submit" type="submit" name="put" value="Put">';
                        echo '</form>';                        
                        echo '</li>';
                    }
                    echo '</ul>';

                ?>
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
