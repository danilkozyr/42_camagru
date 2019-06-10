<?php 

    $email = $_POST['email'];

    try {
		$stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

    if ($user) {
        send_reset_pass_email($user['email'], $user['firstname'], $user['lastname'], $user['hash']);
        $_SESSION['message'] = "Check your email for reset password link";
        header("Location:" . WWW_ROOT . '/login');

    } else {
		echo "<h3>No user with such email address.</h3>";
    }

?>