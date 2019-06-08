<?php require_once('../../private/initialize.php'); ?>
<?php require(PRIVATE_PATH . ('/config/database.php')); ?>
<?php $page_title = 'Camagru Feed'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 

try {
    $sql = "SELECT * FROM img WHERE public=1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([    ]);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<ul class="product-list-basic">';
    foreach ($images as $image) {
        echo '<li>';
            echo '<img src="' . $image['image'] . '" />';
        echo '</li>';
    }
    echo '</ul>';
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>


<?php include(SHARED_PATH . '/footer.php'); ?>
