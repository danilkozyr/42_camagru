<?php
	if (!($_POST['firstname'] && $_POST['lastname'])) {
		echo '<h3>Fill any field to change information</h3>';
	} elseif (!$_POST['pass']) {
		echo '<h3>Fill password to make changes</h3>';
	} else {

		$email = $_SESSION['email'];
	    try {
	        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
	        $stmt->execute([$email]);
	        $user = $stmt->fetch(PDO::FETCH_ASSOC);
	    } catch(PDOException $e) {
	        echo "Error: " . $e->getMessage();
	    }


	    if (!$user) {
			echo "<br><h3>No user with such email.</h3>";
	    } elseif (password_verify($_POST['pass'], $user['pass'])) {
	    	
	    	$_SESSION['firstname'] = $_POST['firstname'];
	    	$_SESSION['lastname'] = $_POST['lastname'];

	    	try {
	    		$sql = "UPDATE users SET firstname=:firstname, lastname=:lastname WHERE email=:email";
	    		$stmt = $pdo->prepare($sql);
	    		$stmt->execute([
	    			':firstname' => $_SESSION['firstname'],
	    			':lastname' => $_SESSION['lastname'],
	    			':email' => $_SESSION['email']
	    		]);
	    	} catch(PDOException $e) {
	    		echo "Error: " . $e->getMessage();
	    	}
	    	header("Location: ". WWW_ROOT . "/profile");
	    } else {
        	echo '<h3>Not Correct Password!</h3>';
    	}

    } 

?>