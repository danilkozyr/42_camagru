<?php require_once('../../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php if ($_SESSION['logged_in'] == false) { header("Location:" . WWW_ROOT . "/pages/login/index.php"); } ?>
<?php if ($_POST['back']) { header("Location: " . WWW_ROOT . "/pages/profile/index.php"); } ?>
<?php
    if ($_POST['confirm']) {
        if ($_POST['new_email'] && $_POST['pass']) {
            require (PRIVATE_PATH . "/login_func/edit_email.php");
        } else {
            $_SESSION['message'] = "Fill all required fields please";
        }
    }
?>

<div class="custom">
    <form class="form1" action="change_email.php" autocomplete="off" method="POST">
        <h1>Account Edition</h1>

        <p class="text_edit_acc">Enter New Email</p>
        <input class="input1" type="email" name="new_email" placeholder="Enter New Email">
        <p class="text_edit_acc">Enter Your Password</p>
        <input class="input1" type="password" name="pass" placeholder="Enter Your Password">

        <?php
            if ($_SESSION['message']) {
                echo '<h3>' . $_SESSION['message'] . '</h3>';
                unset($_SESSION['message']);
            }
        ?>

        <input class="button in_row" type="submit" name="confirm" value="Confirm Changes">
        <input class="button in_row inactive" type="submit" name="back" value="Back 2 Leto">
    </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
