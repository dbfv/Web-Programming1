<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=comp1841;charset=utf8mb4','root','');
    echo "<script>console.log('Connect to DB successfully');</script>";
} catch (PDOException $e) {
    echo "<script>console.log('Connect to DB failed: " . addslashes($e->getMessage()) . "');</script>";
}
