<?php
    if (isset($_SESSION['id'])) {

        try {
            $sql = "SELECT * FROM img WHERE userId=:userId ORDER BY id DESC  LIMIT :page, 9";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':userId', $_SESSION['id'], PDO::PARAM_INT);
            $stmt->bindValue(':page', $page, PDO::PARAM_INT);
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (isset($images) && !empty($images)) {
                echo '<ul class="product-list-basic">';
                foreach ($images as $image) {
                    echo '<li>';
                    echo '<img src="' . $image['image'] . '" />';
                    echo '<form action="snap.php" method="post">
                    <input type="hidden" name="id" value="'.$image['id'].'">
                    <input class="product-list-submit" type="submit" name="Delete" value="Delete">';
                    if ($image['public'] == false) { echo '<input class="product-list-submit" type="submit" name="Post" value="Post">';
                    } else { echo '<input class="product-list-submit-inactive" value="Already Posted">'; }
                    echo '</form>';
                    echo '</li>';
                }
                echo '</ul>';
                
                try {
                    $sql = "SELECT * FROM img WHERE userId=:userId ORDER BY id DESC";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':userId' => $_SESSION['id']
                        ]);
                        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    
                    $count = count($images);
                    $a = $count/9;
                    $a = ceil($a);
                    
                    
                    echo '<form method="get">';
                    for ($b=1; $b <= $a;  $b++) {
                        if ($count > 9)
                        echo '<input class="product-list-submit less_width" type="submit" value="'.$b.'" name="page">';
                    }
                    echo '</form>';
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
            
        }
?>
