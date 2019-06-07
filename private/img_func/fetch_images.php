<?php
    try {
        $sql = "SELECT * FROM images";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        while ($images = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<img class="padding-gallery" src="'.$images['image'].'"';
            echo '<button>Delete</button>';
            echo '<br>';
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>