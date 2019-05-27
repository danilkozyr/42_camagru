<?php

    if (!$_POST['old_pass'] || !$_POST['new_pass'] || !$_POST['conf_pass']) {
        $_SESSION['message'] = "Fill all required fields!";
    } elseif ($_POST['new_pass'] === $_POST['conf_pass']) {
        $uppercase = preg_match('@[A-Z]@', $_POST['old_pass']);
        $lowercase = preg_match('@[a-z]@', $_POST['old_pass']);
        $number    = preg_match('@[0-9]@', $_POST['old_pass']);
        if (!$uppercase || !$lowercase || !$number || strlen($_POST['new_pass']) < 6) {
            $_SESSION['message'] = "Password should be at least 6 characters in length<br> and should include at least one upper case letter and one number";
        } else {
            try {
                $email = $_SESSION['email'];
                $stmt = $pdo->prepare("SELECT pass FROM users WHERE email=?");
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            if (password_verify($_POST['old_pass'], $user['pass'])) {
               
                $new_password = password_hash($_POST['new_pass'], PASSWORD_BCRYPT);
            
                try {
                    $sql = "UPDATE users SET pass=:new_pass WHERE email=:email";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':new_pass' => $new_password,
                        ':email' => $email
                    ]);
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
    
                $_SESSION['message'] = "Your password changed successfuly";
    
            } else {
                $_SESSION['message'] = "Incorrect Password";
            }
        }
    } else {
        $_SESSION['message'] = "New Passwords Don't Match";
    }


?>
