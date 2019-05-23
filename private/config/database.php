<?php
    /* DATABASE connect to server */

    $DB_DSN = 'mysql:host=localhost;dbname=accounts';
    $DB_USER = 'root';
    $DB_PASSWORD = '123456';

    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>