<?php
	/* Add variables to session for the next using */


	$_SESSION['email'] = $_POST['email'];
	$_SESSION['firstname'] = $_POST['firstname'];
	$_SESSION['lastname'] = $_POST['lastname'];

	/* используем для того чтобы обезопасить данные перед отправкой в sql */

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
	$hash = md5(rand(0,1000));

    try {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $sth = $pdo->query($sql);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // print_r($sql);
    // print_r($sth);

    // die;
    

	if ($result->num_rows > 0) {
    	$_SESSION['reg_message'] = 'User with this email already exists!';
    	header("url=account.php?a=signup");
	}
	else {
	    $sql = "INSERT INTO users (firstname, lastname, email, pass, hash) " 
	            . "VALUES ('$firstname','$lastname','$email','$password', '$hash')";
	    if ( $mysqli->query($sql) ) {

	        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
	        $_SESSION['logged_in'] = true; // So we know the user has logged in
;

			// Send registration confirmation link (verify.php)
	        $to      = $email;
	        $subject = 'Account Verification ( camagru.com )';
	        $message_body = '
	        Hello '.$name.',

	        Thank you for signing up!

	        Please click this link to activate your account:

	        http://localhost:8100/Camagru/verify.php?email='.$email.'&hash='.$hash;  

	        mail( $to, $subject, $message_body );
	        header("location: profile.php"); 
	    }
    }

?>