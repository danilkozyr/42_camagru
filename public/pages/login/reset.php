<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Password Reset'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

        <div class="custom">
            <form class="form1" action="reset.php" autocomplete="off" method="POST">
                <h1>Reset your password!</h1>
                <input class="input1" type="password" name="pass" placeholder="Enter new password">
                <input class="input1" type="password" name="confirm_pass" placeholder="Confirm new password">
                <?php     
                    if ((!$_POST['pass'] || !$_POST['confirm_pass']) && $_POST['reset'] == "Reset") {
                        echo '<h3>Fill all required fields.</h3>';
                    } elseif (!($_POST['pass'] === $_POST['confirm_pass'])) {
                        echo "<h3>Passwords don't match.</h3>";
                    } elseif ($_POST['reset']) {
                        header("Location: index.php");
                    }
                ?>
                <input class="button" type="submit" name="reset" value="Reset"><br>
                <a class="txt" href="index.php">Log In</a>
            </form>
        </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
