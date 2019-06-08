<?php

    try {
        $sql = "SELECT * FROM img WHERE userId=:userId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':userId' => $_SESSION['id']
        ]);
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<ul class="product-list-basic">';
        foreach ($images as $image) {
            echo '<li>';
                echo '<img src="' . $image['image'] . '" />';
                echo '<form action="photo.php" method="post">
                <input type="hidden" name="id" value="'.$image['id'].'">
                <input class="product-list-submit" type="submit" name="Delete" value="Delete">';
                if ($image['public'] == false) { echo '<input class="product-list-submit" type="submit" name="Post" value="Post">';
                } else { echo '<input class="product-list-submit-inactive" value="Already Posted">'; }
                echo '</form>';
            echo '</li>';
        }
        echo '</ul>';
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    

?>
