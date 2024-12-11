<?php 
require_once "../includes/authorization.php";

$title = "Home";
ob_start();

include '../includes/connect_db.php';
$sql = "SELECT posts.*, users.*
FROM posts
INNER JOIN users ON posts.user_id = users.id
ORDER BY posts.post_date DESC;";
$posts = $pdo->query($sql);
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

include "../templates/home.html.php";
$output = ob_get_clean();
include "../templates/layout.html.php";
