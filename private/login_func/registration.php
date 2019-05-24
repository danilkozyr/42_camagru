<?php
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['firstname'] = $_POST['firstname'];
	$_SESSION['lastname'] = $_POST['lastname'];
	$_SESSION['logged_in'] = true;
	$_SESSION['active'] = 0;

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
	$hash = md5(rand(0,1000));

	try {
		$stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
		$stmt->execute([$email]);
		$count = $stmt->fetchColumn();
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	if ($count > 0) {
		echo "<br><h3>User with this email already exists</h3>";
    	header("url=index.php?a=signup");
	}
	else {
		try {
			$sql = "INSERT INTO users (firstname, lastname, email, pass, hash) VALUES (:firstname, :lastname, :email, :pass, :hash)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([
				':firstname' => $firstname,
				':lastname' => $lastname,
				':email' => $email,
				':pass' => $pass,
				':hash' => $hash
			]);
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$_SESSION['active'] = 0;
		$_SESSION['logged_in'] = true;
		$_SESSION['hash'] = $hash;
		send_verification_email($email, $firstname, $lastname, $hash);
		echo '<h3>Check your email for verification link.<br>Redirecting...</h3>';
	    header("refresh:3;url=index.php"); 
    }

?>