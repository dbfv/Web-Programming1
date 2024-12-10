<?php
require '../includes/connect_db.php';
// Retrieve data of users from the database
$sql = 'SELECT * FROM modules'; 
$modules = $pdo->query($sql);
if (!$modules) {
    die("Query failed.");
}