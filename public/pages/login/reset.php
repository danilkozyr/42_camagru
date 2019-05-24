<?php require_once('../../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php $page_title = 'Password Reset'; ?>
<?php if ($_SESSION['logged_in']) { header("Location:" . WWW_ROOT . "/pages/profile/index.php"); } ?>
<?php

    if (($_GET['email'] && $_GET['hash'])) {
        $email = $_GET['email'];
        $hash = $_GET['hash'];

        $_SESSION['email'] = $email;
        $_SESSION['hash'] = $hash;

        try {
            $sql = "SELECT * FROM users WHERE email=:email AND hash=:hash";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':hash' => $hash
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        if (!$user) {
            $_SESSION['ver_message'] = "Invalid Link";
            header("Location:" . WWW_ROOT . "/pages/login/index.php");
        }
    } elseif (!$_POST['pass'] && !$_POST['confirm_pass']) {
        $_SESSION['ver_message'] = "Invalid Link";
        header("Location:" . WWW_ROOT . "/pages/login/index.php");
    }

?>


<div class="custom">
    <form class="form1" action="reset.php" autocomplete="off" method="POST">
        <h1>Reset your password!</h1>
        <input class="input1" type="password" name="pass" placeholder="Enter new password">
        <input class="input1" type="password" name="confirm_pass" placeholder="Confirm new password">
        <?php
            if ($_POST['reset']) {
                
                $uppercase = preg_match('@[A-Z]@', $_POST['pass']);
                $lowercase = preg_match('@[a-z]@', $_POST['pass']);
                $number    = preg_match('@[0-9]@', $_POST['pass']);

                if ((!$_POST['pass'] || !$_POST['confirm_pass'])) {
                    echo '<h3>Fill all required fields.</h3>';
                } elseif (!($_POST['pass'] === $_POST['confirm_pass'])) {
                    echo "<h3>Passwords don't match.</h3>";
                } elseif (!$uppercase || !$lowercase || !$number || strlen($_POST['pass']) < 6) {
                    echo '<h3>Password should be at least 6 characters in length<br> and should include at least one upper case letter and one number.</h3>';
                } else {
                    require_once(PRIVATE_PATH . '/login_func/reset_password.php');
                }
            }
        ?>
        <input class="button" type="submit" name="reset" value="Reset"><br>
        <a class="txt" href="index.php">Log In</a>
    </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
