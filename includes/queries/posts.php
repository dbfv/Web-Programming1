<?php
require '../includes/connect_db.php';
// Retrieve data of users from the database
$sql = 'SELECT * FROM posts'; 
$posts = $pdo->query($sql);
if (!$posts) {
    die("Query failed.");
}