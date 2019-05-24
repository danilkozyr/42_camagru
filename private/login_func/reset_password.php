<?php require(PRIVATE_PATH . ('/config/database.php')); ?>

<?php
    session_start();

    $new_password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $new_hash = md5(rand(0, 1000));

    try {
        $sql = "UPDATE users SET pass=:new_pass, hash=:new_hash WHERE email=:email AND hash=:hash";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':new_pass' => $new_password,
            ':new_hash' => $new_hash,
            ':email' => $_SESSION['email'],
            ':hash' => $_SESSION['hash']
        ]);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    unset($_SESSION['hash']);
    unset($_SESSION['email']);
    header("Location: " . WWW_ROOT . "/pages/login/index.php");
?>