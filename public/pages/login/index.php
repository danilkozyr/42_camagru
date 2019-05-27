<?php require_once('../../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php $page_title = 'Camagru Login'; ?>
<?php if ($_SESSION['logged_in']) { header("Location:" . WWW_ROOT . "/pages/profile/index.php"); } ?>


<div class="custom">
    <ul class="tab-group">
        <li class="tab <?php
                if (!isset($_GET['a']) or $_GET['a'] == 'login') { echo "active"; }  
            ?>"><a href="?a=login">Log In</a>
        </li>
        <li class="tab <?php
                if ($_GET['a'] == 'signup') { echo "active"; }
            ?>"><a href="?a=signup">Sign Up</a>
        </li>
    </ul>
    <div class="tab-content">
        <?php if (!isset($_GET['a']) or $_GET['a'] == 'login'): ?>
        <div id="login">
            <form class="form1" action="index.php" autocomplete="off" method="POST">
                <h1>Welcome!</h1>
                <?php if (isset($_POST['signin'])) { $email = $_POST['email']; }
                ?>
                <input class="input1" type="email" name="email" value="<?php echo $email ?>" placeholder="Enter your email">
                <input class="input1" type="password" name="pass" placeholder="Enter your password">
                <?php
                    if (isset($_POST['signin'])) {
                        if (!($_POST['email'] && $_POST['pass'])) {
                            echo '<h3>Fill all required fileds</h3>';
                        } else { require(PRIVATE_PATH . '/login_func/login.php'); }
                    }
                    if ($_SESSION['message']) {
                        echo '<h3>' . $_SESSION['message'] . '</h3>';
                        unset($_SESSION['message']);
                    }
                ?>
                <input class="button" type="submit" name="signin" value="Sign In"><br>
                <a class="txt" href="forgot.php">Forgot Password?</a>
            </form>
        </div>
        
        <?php elseif ($_GET['a'] == 'signup'): ?>
        <div id="signup">
            <h1>Registration</h1>
            <form class="form1" autocomplete="off" action="index.php?a=signup" method="POST">

                <?php
                    if (isset($_POST['register'])) {
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                    }
                ?>
                
                <input class="input1" type="name" name="firstname" value="<?php echo $firstname; ?>" placeholder="Enter your name">
                <input class="input1" type="name" name="lastname" value="<?php echo $lastname; ?>" placeholder="Enter your last name">
                <input class="input1" type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
                <input class="input1" type="password" name="pass" placeholder="Enter your password">
                <?php

                    if (isset($_POST['register'])) {

                        $uppercase = preg_match('@[A-Z]@', $_POST['pass']);
                        $lowercase = preg_match('@[a-z]@', $_POST['pass']);
                        $number    = preg_match('@[0-9]@', $_POST['pass']);

                        if(!($_POST['email'] && $_POST['firstname'] && $_POST['lastname'] && $_POST['pass'])) {
                            echo '<h3>Fill all required fileds</h3>';
                        } elseif (!$uppercase || !$lowercase || !$number || strlen($_POST['pass']) < 6) {
                            echo '<h3>Password should be at least 6 characters in length<br> and should include at least one upper case letter and one number.</h3>';
                        } else {
                            require(PRIVATE_PATH . '/login_func/registration.php');
                        }
                    }
                ?>
                <input class="button" type="submit" name="register" value="Create account"><br>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
