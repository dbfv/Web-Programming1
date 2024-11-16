<?php
require '../includes/connect_db.php';
// Retrieve data of users from the database
$sql = 'SELECT * FROM subjects'; 
$subjects = $pdo->query($sql);
if (!$subjects) {
    die("Query failed.");
}