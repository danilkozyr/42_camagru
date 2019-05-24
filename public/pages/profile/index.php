<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Camagru Profile'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php if ($_POST['logout']) { require(PRIVATE_PATH . '/login_func/logout.php'); }?>
<?php if ($_POST['verify']) { send_verification_email($_SESSION['email'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['hash']); }?>
<?php if ($_SESSION['logged_in'] == false) { header("Location:" . WWW_ROOT . "/pages/login/index.php"); } ?>


<div class="custom">
    <form class="form1" action="index.php" autocomplete="off" method="POST">
        <h1><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']?></h1>
        <?php
            if ($_SESSION['active'] == 0) {
                echo '<h3>Validate your account, please!<br>
                Check your email<br>'.$_SESSION['email'].'</h3>';
                echo '<input class="button" type="submit" name="verify" value="Resend Email">';
                echo '<input class="button" type="submit" name="logout" value="Log Out"><br>';
            } else {
                echo '<h3>Account is validated.</h3>';
                echo '<input class="button" type="submit" name="logout" value="Log Out"><br>';
            }
        ?>
    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
