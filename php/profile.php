<?php 
require_once "../includes/authorization.php"; 
include '../includes/connect_db.php'; 
$title = "User  Profile";

$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sqlPosts = "SELECT posts.*, users.username, users.avatar 
              FROM posts 
              INNER JOIN users ON posts.user_id = users.id 
              WHERE posts.user_id = :user_id 
              ORDER BY posts.post_date DESC";
$stmtPosts = $pdo->prepare($sqlPosts);
$stmtPosts->bindValue(':user_id', $user_id);
$stmtPosts->execute();
$userPosts = $stmtPosts->fetchAll(PDO::FETCH_ASSOC);

ob_start();
include "../templates/profile.html.php"; 
$output = ob_get_clean();
include "../templates/layout.html.php";