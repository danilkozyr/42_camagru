<?php

    $DB_DSN = 'mysql:host=localhost;';
    $DB_USER = 'root';
    $DB_PASSWORD = '123456';

    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->query('CREATE DATABASE accounts');
        $pdo->query('
        CREATE TABLE `accounts`.`img` 
        (
            `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `userId` int(10) NOT NULL,
            `image` longtext NOT NULL,
            `public` INT NULL DEFAULT 0
        );');
        $pdo->query('
        CREATE TABLE `accounts`.`users` 
        (
            `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `firstname` VARCHAR(50) NOT NULL,
            `lastname` VARCHAR(50) NOT NULL,
            `email` VARCHAR(100) NOT NULL,
            `pass` VARCHAR(100) NOT NULL,
            `hash` VARCHAR(32) NOT NULL,
            `img` longtext,
            `email_prefer` BOOL NOT NULL DEFAULT 1,
            `active` BOOL NOT NULL DEFAULT 0
        );');
        $pdo->query('
        CREATE TABLE `accounts`.`comments` 
        (
            `commentId` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `photoId` int(10) NOT NULL,
            `userId` int(10) NOT NULL,
            `comment` longtext NOT NULL
        );');
        $pdo->query('
        CREATE TABLE `accounts`.`likes` 
        (
            `likeId` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `photoId` int(10) NOT NULL,
            `userId` int(10) NOT NULL
        );');
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>