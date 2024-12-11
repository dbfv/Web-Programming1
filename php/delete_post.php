<?php
require_once "../includes/authorization.php";
include '../includes/connect_db.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $userId = $_SESSION['user']['id'];

    // Check if the post belongs to the user
    $sql = "SELECT * FROM posts WHERE id = :postId AND user_id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':postId', $postId);
    $stmt->bindValue(':userId', $userId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Post exists and belongs to the user, proceed to delete
        $sql = "DELETE FROM posts WHERE id = :postId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':postId', $postId);
        $stmt->execute();
    }

    header("Location: ../php/home.php"); // Redirect back to home
    exit;
}
?>