<?php

    $DB_DSN = 'mysql:host=localhost;';
    $DB_USER = 'root';
    $DB_PASSWORD = 'root';

    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->query('CREATE DATABASE accounts');
        $pdo->query('
        CREATE TABLE `accounts`.`users` 
        (
            `id` INT NOT NULL AUTO_INCREMENT,
            `firstname` VARCHAR(50) NOT NULL,
            `lastname` VARCHAR(50) NOT NULL,
            `email` VARCHAR(100) NOT NULL,
            `pass` VARCHAR(100) NOT NULL,
            `hash` VARCHAR(32) NOT NULL,
            `active` BOOL NOT NULL DEFAULT 0,
        PRIMARY KEY (`id`) 
        );');
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>