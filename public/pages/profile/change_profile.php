<?php require_once('../../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div class="custom">
    <form class="form1" action="change_profile.php" autocomplete="off" method="POST">
        <h1>Account Edition</h1>

        <p class="text_edit_acc">Your name: <?php echo $_SESSION['firstname']; ?></p>
        <input class="input1" type="name" name="firstname" placeholder="Change Your First Name">

        <p class="text_edit_acc">Your name: <?php echo $_SESSION['lastname']; ?></p>

        <input class="input1" type="name" name="lastname" placeholder="Change Your Last Name">

        <p class="text_edit_acc">Enter Password to Confirm Changes</p>

        <input class="input1" type="password" name="pass" placeholder="Enter Password To Confirm">

		<?php if ($_POST['edit']) { require_once(PRIVATE_PATH . '/login_func/edit.php' ); } ?>		
        
        <!-- <input class="button in_row" type="submit" name="edit_email" value="Edit Email"> -->
        <input class="button" type="submit" name="edit" value="Edit Account"><br>

        <!-- <input class="button" type="submit" name="edit_pass" value="Edit Password"> -->
    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
