<?php require_once('../../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>

<?php
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
        $email = $_GET['email'];
        $hash = $_GET['hash'];
    
        $sql = "SELECT * FROM users WHERE email=:email AND hash=:hash AND active='0'";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':hash' => $hash
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        if ($user) {
            try {
                $sql = "UPDATE users SET active='1' WHERE email=:email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':email' => $email
                ]);
                $_SESSION['active'] = 1;
                echo "yeap";
                header("Location:" . WWW_ROOT . "/pages/profile/index.php");
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }      
        } else {
            $_SESSION['message'] = "The URL is invalid!";
            header("Location:" . WWW_ROOT . "/pages/login/index.php");
        }
    } else {
        $_SESSION['message'] = "Invalid parameters provided for account verification!";
        header("Location:" . WWW_ROOT . "/pages/login/index.php");
    }
?>