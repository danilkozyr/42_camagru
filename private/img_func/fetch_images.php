<?php
    try {
        $sql = "SELECT * FROM images";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ;
        while ($images = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // echo $images['id'];
            echo '<img class="padding-gallery" src="'.$images['image'].'"';
            echo '<br>';
            // print_r($images);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>