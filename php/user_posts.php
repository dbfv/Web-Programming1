<?php
require_once "../includes/authorization.php";
include '../includes/connect_db.php';

$title = "User  Posts";
ob_start();

// Get the user ID from the URL
$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch posts made by the user
$sql = "SELECT posts.*, users.username, users.avatar 
        FROM posts 
        INNER JOIN users ON posts.user_id = users.id 
        WHERE posts.user_id = :user_id 
        ORDER BY posts.post_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch the user information
$sqlUser  = "SELECT * FROM users WHERE id = :user_id";
$stmtUser  = $pdo->prepare($sqlUser );
$stmtUser ->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmtUser ->execute();
$user = $stmtUser ->fetch(PDO::FETCH_ASSOC);

include "../templates/user_posts.html.php";
$output = ob_get_clean();
include "../templates/layout.html.php";