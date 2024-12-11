<?php
require '../includes/connect_db.php';
// Retrieve data of users from the database
$sql = 'SELECT * FROM users'; 
$users = $pdo->query($sql);
if (!$users) {
    die("Query failed.");
}