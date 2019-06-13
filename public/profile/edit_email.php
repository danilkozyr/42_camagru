<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php if (empty($_SESSION['logged_in']) ||  $_SESSION['logged_in'] == false) { header("Location:" . WWW_ROOT . "/login/"); } ?>
<?php if (isset($_POST['back'])) { header("Location: " . WWW_ROOT . "/profile/"); } ?>
<?php
    if (isset($_POST['confirm']) && $_POST['confirm']) {
        if (isset($_POST['new_email']) && isset($_POST['pass'])) {
            require (PRIVATE_PATH . "/login_func/edit_email.php");
        } else {
            $_SESSION['message'] = "Fill all required fields please";
        }
    }
?>

<div class="custom">
    <form class="form1" action="edit_email.php" autocomplete="off" method="POST">
        <h1>Account Edition</h1>

        <p class="text_edit_acc">Enter New Email</p>
        <input class="input1" type="email" name="new_email" placeholder="Enter New Email">
        <p class="text_edit_acc">Enter Your Password</p>
        <input class="input1" type="password" name="pass" placeholder="Enter Your Password">

        <?php
            if (isset($_SESSION['message']) && $_SESSION['message']) {
                echo '<h3>' . $_SESSION['message'] . '</h3>';
                unset($_SESSION['message']);
            }
        ?>

        <input class="button in_row" type="submit" name="confirm" value="Confirm Changes">
        <input class="button in_row inactive" type="submit" name="back" value="Back 2 Leto">
    </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
