<?php 
// require_once "../includes/check.php";


$title = "Home";
ob_start();

include "../includes/connect_db.php";
echo 'ngu';

$sql = "SELECT posts.* FROM posts
        INNER JOIN users ON posts.user_id = users.id
        INNER JOIN modules ON posts.module_id = modules.id
        ORDER BY post_date DESC";
$posts = $pdo->query($sql);
$posts = $posts->fetchAll(PDO::FETCH_ASSOC); //to take the actual data and not a list :) 

include "../templates/home.html.php";
$output = ob_get_clean();
// include "../templates/layout.html.php";
