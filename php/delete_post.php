<?php
include '../includes/connect_db.php'; // Include your database connection

    $postId = intval($_GET['id']); // Get the post ID from the URL and ensure it's an integer

    // Prepare a SQL statement to delete the post
    $sql = "DELETE FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $postId, PDO::PARAM_INT);

    $stmt->execute() ;
        // Redirect to the user's profile or posts page with a success message
        header("Location: ../php/profile.php");
        exit();
