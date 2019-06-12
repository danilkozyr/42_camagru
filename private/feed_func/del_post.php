<?php

    try {
        $sql = "UPDATE img SET public = '0' WHERE id=:imgId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':imgId' => $_POST['photoId']
        ]);
    } catch (PDOException $e) {
        echo "Error: " . $e->GetMessage();
    }
    header ('Location: ' . $_SERVER['REQUEST_URI']);

?>