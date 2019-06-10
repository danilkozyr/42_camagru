<?php require_once('../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php $page_title = 'Camagru Feed'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<section class="container">

    <?php require_once(PRIVATE_PATH . ('/feed_func/fetch_posts.php')); ?>

</section>






<?php include(SHARED_PATH . '/footer.php'); ?>
