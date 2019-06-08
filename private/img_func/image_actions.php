<?php 
    if (isset($_POST['Delete'])) {
        try {
            $sql = "DELETE FROM img WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $_POST['id']
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['Post'])) {
        try {
            $sql = "UPDATE img SET public=:public WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':public' => 1,
                ':id' => $_POST['id']
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>