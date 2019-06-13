<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php $page_title = 'Password Reset'; ?>
<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { header("Location:" . WWW_ROOT . "/profile/"); } ?>


<div class="custom">
    <form class="form1" action="forgot.php" autocomplete="off" method="POST">
        <h1>Reset your password</h1>
        <input class="input1" type="email" name="email" placeholder="Enter your email">
        <?php     
            if (!isset($_POST['email']) && isset($_POST['reset'])) {
                    echo '<h3>Enter your email address please.</h3>';
            } elseif (isset($_POST['reset'])) {
                require(PRIVATE_PATH . '/login_func/forgot.php');
            }
        ?>
        <input class="button" type="submit" name="reset" value="Reset"><br>
        <a class="txt" href="<?php echo WWW_ROOT . "/login" ?>">Log In</a>
    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
