<?php
require "../includes/connect_db.php"; 

// Retrieve data of users from the database
$sql = 'SELECT * FROM subjects'; 
$users = $pdo->query($sql);
