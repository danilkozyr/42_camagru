<?php

    $_SESSION['new'] = $_POST;
    $key = null;
    $default = "http://localhost:8100/public/images/default.png";
    foreach ($_SESSION['new'] as $k => $value) {
    $key = $k;
    }
    if (strcmp($value, $default) == 0) {
        echo "<script>alert('1')</script>";die;
    }
    try {
        $sql = "INSERT INTO img (image, userId) VALUES (:img, :userId)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':img' =>   $value,
            ':userId' => $_SESSION['id']
        ]);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    header("Location: " . WWW_ROOT . "/pages/photo.php");

?>