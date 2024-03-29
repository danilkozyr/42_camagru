<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php $page_title = 'Camagru Profile'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) { header("Location:" . WWW_ROOT . "/login/"); } ?>
<?php if (isset($_POST['logout']) && $_POST['logout']) { require(PRIVATE_PATH . '/login_func/logout.php'); }?>
<?php if (isset($_FILES['file'])) { require(PRIVATE_PATH . '/login_func/edit_img.php'); }?>
<?php if (isset($_POST['verify']) && $_POST['verify']) { send_verification_email($_SESSION['email'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['hash']); }?>
<?php if (isset($_POST['edit']) && $_POST['edit']) { header("Location: edit_profile"); } ?>

<div class="custom">
    <form class="form1" action="" autocomplete="off" method="POST" enctype="multipart/form-data">    
        <h1>Your Profile</h1>
        <table class="profile_page">
            <th>
                <h2>First Name: <?php echo htmlentities($_SESSION['firstname']); ?><br>Last Name: <?php echo htmlentities($_SESSION['lastname']); ?><br>Email: <?php echo htmlentities($_SESSION['email']); ?></h2>
            </th>
            <th>
                <?php if (isset($_SESSION['img']) && !empty($_SESSION['img'])) { echo "<img class='ava' src='". $_SESSION['img'] . "'><br>"; }
                    else { echo "<img class='ava' src='" . WWW_ROOT . "/images/profile.png'><br>"; } ?>
                <div class="custom-file">
                    <label for="file-upload" class="custom-file-upload">change photo</label>
                    <input id="file-upload" type="file" onchange="this.form.submit()" name="file"><br>
                </div>
            </th>
        </table>
        <input class="button" type="submit" name="edit" value="Edit Account">
    </form>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
