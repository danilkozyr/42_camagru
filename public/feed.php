<?php require_once('../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php $page_title = 'Camagru Feed'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php if (isset($_POST['commentButton'])) { require_once(PRIVATE_PATH . "/feed_func/comment_post.php"); }?>
<?php if (isset($_POST['like']) && $_POST['like'] == 1) { require_once(PRIVATE_PATH . "/feed_func/like_post.php"); }?>
<?php if (isset($_POST['del_post_x'])) { require_once(PRIVATE_PATH . "/feed_func/del_post.php"); } ?>
<section class="container">

    <?php require_once(PRIVATE_PATH . ('/feed_func/fetch_posts.php')); ?>

</section>


<?php #include(SHARED_PATH . '/footer.php'); ?>
