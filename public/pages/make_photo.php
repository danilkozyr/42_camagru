<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Camagru Home'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<div class="booth">
    <video id="video" width="600" height="450" ></video>
    <a href="#" id="capture" class="booth-button">Take Photo</a>
    <canvas id="canvas"  width="600" height="450"></canvas>
</div>

<script src="../js/photo.js"></script>

<?php include(SHARED_PATH . '/footer.php'); ?>
