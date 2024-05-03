<?php

// Database connection settings

$dsn = "mysql:host=localhost;dbname=vehicles_admin";
$db_user = 'root';
$db_pass = ' ';

try {
    // Create PDO connection
    $db = new PDO($dsn, $db_user);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Catch any errors and display
    $error_message = "Database Error ";
    $error_message .= " " . $e->getMessage();
    include('./View/error.php');
    exit();
}
