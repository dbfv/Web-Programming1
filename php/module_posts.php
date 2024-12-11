<?php
require_once "../includes/authorization.php";
include '../includes/connect_db.php';

$title = "Module Posts";
ob_start();

$module_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT posts.*, users.username, users.avatar 
        FROM posts 
        INNER JOIN users ON posts.user_id = users.id 
        WHERE posts.module_id = :module_id 
        ORDER BY posts.post_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':module_id', $module_id, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch the module name
$sqlModule = "SELECT name FROM modules WHERE id = :module_id";
$stmtModule = $pdo->prepare($sqlModule);
$stmtModule->bindValue(':module_id', $module_id, PDO::PARAM_INT);
$stmtModule->execute();
$module = $stmtModule->fetch(PDO::FETCH_ASSOC);

include "../templates/module_posts.html.php";
$output = ob_get_clean();
include "../templates/layout.html.php";