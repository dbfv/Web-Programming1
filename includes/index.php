<?php 
require 'connect_db.php';

$title = 'Homepage'; 
ob_start(); 
include '../templates/layout.html.php';
$sql = 'SELECT * FROM POSTS'; 
$posts = $pdo->query($sql); 

$output = $posts; 

$output = ob_get_clean();