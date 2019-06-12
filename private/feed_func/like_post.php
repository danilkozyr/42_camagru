<?php


    if ($_POST['isLiked'] == "true") {
        try {
            $sql = "DELETE FROM likes WHERE photoId=:photoId AND userId=:userId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':photoId' => $_POST['photoId'],
                ':userId' => $_SESSION['id']
            ]);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    } else {
        
        try {
            $sql = "INSERT INTO likes(photoId, userId) VALUES (:photoId, :userId)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':photoId' => $_POST['photoId'],
                ':userId' => $_SESSION['id']
            ]);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    header ('Location: ' . $_SERVER['REQUEST_URI']);

?>