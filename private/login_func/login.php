<?php
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if (!$user) {
		echo "<br><h3>No user with such email.</h3>";
    } elseif ($user['active'] == 0) {
        echo '<h3>You have not validated your account!<br>Please, check your email!</h3>';
    } elseif (password_verify($_POST['pass'], $user['pass'])) {
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['hash'] = $user['hash'];
        $_SESSION['img'] = $user['img'];
        $_SESSION['email_prefer'] = $user['email_prefer'];

        $_SESSION['logged_in'] = true;
        header("Location:" . WWW_ROOT . "/profile/");
    } else {
        echo '<h3>Not Correct Password!</h3>';
    }
?>