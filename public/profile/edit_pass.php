<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) { header("Location:" . WWW_ROOT . "/login/"); } ?>
<?php if (isset($_POST['back'])) { header("Location: " . WWW_ROOT . "/profile/"); } ?>
<?php
    if (isset($_POST['confirm'])) {
		require_once(PRIVATE_PATH . '/login_func/edit_pass.php' );
    }
?>


<div class="custom">
    <form class="form1" action="edit_pass.php" autocomplete="off" method="POST">
        <h1>Account Edition</h1>

        <p class="text_edit_acc">Enter Old Password</p>
        <input class="input1" type="password" name="old_pass" placeholder="Your Old Password">

        <p class="text_edit_acc">Enter New Password</p>
        <input class="input1" type="password" name="new_pass" placeholder="Enter New Password">
        <input class="input1" type="password" name="conf_pass" placeholder="Enter Password To Confirm">
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
