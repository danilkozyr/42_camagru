<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Password Reset'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<div class="custom">
    <form class="form1" action="forgot.php" autocomplete="off" method="POST">
        <h1>Reset your password</h1>
        <input class="input1" type="email" name="email" placeholder="Enter your email">
        <?php     
            if (!$_POST['email'] && $_POST['reset'] == "Reset") {
                    echo '<h3>Enter your email please.</h3>';
            } elseif ($_POST['reset']) {
                header("Location: index.php");
            }
        ?>
        <input class="button" type="submit" name="reset" value="Reset"><br>
        <a class="txt" href="index.php">Log In</a>
    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
