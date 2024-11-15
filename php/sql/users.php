<?php
require "../connect_db.php";

$sql = 'select * from users'; 
$users = $pdo->query($sql); 
