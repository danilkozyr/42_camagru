<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) { header("Location:" . WWW_ROOT . "/login/"); } ?>
<?php if (isset($_POST['edit_pass'])) { header("Location:" . WWW_ROOT . "/profile/edit_pass"); } ?>
<?php if (isset($_POST['edit_email'])) { header("Location:" . WWW_ROOT . "/profile/edit_email"); } ?>
<?php if (isset($_POST['email_prefer'])) { require_once(PRIVATE_PATH . "/login_func/email_prefer.php"); } ?>

<div class="custom">
    <form class="form1" action="edit_profile.php" autocomplete="off" method="POST">
        <h1>Account Edition</h1>

        <p class="text_edit_acc">Your name: <?php echo htmlentities($_SESSION['firstname']); ?></p>
        <input class="input1" type="name" name="firstname" placeholder="Change Your First Name">

        <p class="text_edit_acc">Your name: <?php echo htmlentities($_SESSION['lastname']); ?></p>
        <input class="input1" type="name" name="lastname" placeholder="Change Your Last Name">

        <p class="text_edit_acc">Enter Password to Confirm Changes</p>
        <input class="input1" type="password" name="pass" placeholder="Enter Password To Confirm">

		<?php if (isset($_POST['edit'])) {  
        if (strlen($_POST['firstname']) > 50 || strlen($_POST['lastname']) > 50) {
            echo '<h3>Fields you enter can not be more than 50 characters!</h3>';
        } elseif (!empty($_POST['firstname']) && !empty($_POST['lastname'])) {
            require_once(PRIVATE_PATH . '/login_func/edit_profile.php' ); 
        } else {
            echo '<h3>Enter all Fields</h3>';
        }
            
        } ?>		
        
        <input class="button margin" type="submit" name="edit" value="Edit Account"><br>
        <input class="button in_row inactive" type="submit" name="edit_email" value="Edit Email">
        <input class="button in_row inactive" type="submit" name="edit_pass" value="Edit Password"><br>
        <?php if (isset($_SESSION['email_prefer']) && $_SESSION['email_prefer']): ?>
            <input class="button in_row inactive" type="submit" name="email_prefer" value="Disable Email Preference">
        <?php else: ?>
            <input class="button in_row inactive" type="submit" name="email_prefer" value="Enable Email Preference">
        <?php endif; ?>
    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
