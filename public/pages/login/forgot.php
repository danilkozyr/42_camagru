<?php require_once('../../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php $page_title = 'Password Reset'; ?>
<?php if ($_SESSION['logged_in']) { header("Location:" . WWW_ROOT . "/pages/profile/index.php"); } ?>


<div class="custom">
    <form class="form1" action="forgot.php" autocomplete="off" method="POST">
        <h1>Reset your password</h1>
        <input class="input1" type="email" name="email" placeholder="Enter your email">
        <?php     
            if (!$_POST['email'] && $_POST['reset']) {
                    echo '<h3>Enter your email address please.</h3>';
            } elseif ($_POST['reset']) {
                require(PRIVATE_PATH . '/login_func/forgot.php');
            }
        ?>
        <input class="button" type="submit" name="reset" value="Reset"><br>
        <a class="txt" href="index.php">Log In</a>
    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
