<?php
try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=localhost;dbname=coursework;charset=utf8mb4", 'root', '');
    
    // Set PDO error mode to exception for better debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Log success message in the browser console
    echo "<script>console.log('Connect to DB successfully');</script>";
} catch (PDOException $e) {
    // Escape the error message to prevent script injection in console log
    $error_message = addslashes($e->getMessage());
    echo "<script>console.log('Connect to DB failed: $error_message');</script>";
    
    // Optionally, exit the script if the connection fails
    die("Database connection failed: $error_message");
}
?>