<?php

    try {
        $email = $_POST['new_email'];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($count > 0) {
        $_SESSION['message'] = "User with this email already exists";
    } else {
        
        try {
            $email = $_SESSION['email'];
            $stmt = $pdo->prepare("SELECT pass FROM users WHERE email=?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        if (password_verify($_POST['pass'], $user['pass'])) {
               
            try {
                $sql = "UPDATE users SET email=:new_email WHERE email=:email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':new_email' => $_POST['new_email'],
                    ':email' => $email
                 ]);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $_SESSION['email'] = $_POST['new_email'];
            $_SESSION['message'] = "Your password changed successfuly";
            header("Location: " . WWW_ROOT . "/pages/profile/");
    
        } else {
    
            $_SESSION['message'] = "Incorrect Password";
    
        }
        
    }

?>
