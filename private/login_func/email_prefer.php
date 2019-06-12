<?php 
    if ($_SESSION['email_prefer'] == 1) {
        change_email_prefer(0);
    } else {
        change_email_prefer(1);
    }

    function change_email_prefer($switcher) {
        require(PRIVATE_PATH . ('/config/database.php'));
        try {
            $sql = "UPDATE users SET email_prefer=:email_prefer WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email_prefer' => $switcher,
                ':email' => $_SESSION['email']
            ]);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $_SESSION['email_prefer'] = $switcher;
        header("Location: " . WWW_ROOT);
    }

?>