<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Edit Account'; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php if ($_POST['edit']) { require_once(PRIVATE_PATH . '/login_func/edit.php' ); } ?>


<div class="custom">
    <form class="form1" action="change_profile.php" autocomplete="off" method="POST">
        <h1>Account Edition</h1>

        <input class="input1" type="name" name="firstname" placeholder="Enter New First Name">
        <input class="input1" type="name" name="lastname" placeholder="Enter New Last Name">
        <input class="input1" type="email" name="email" placeholder="Enter New Email">
        <input class="input1" type="password" name="pass" placeholder="Enter Password To Confirm">


        <input class="button" type="submit" name="edit" value="Edit">

    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
