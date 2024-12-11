<?php
include '../includes/connect_db.php'; // Include your database connection
session_start(); // Start the session to access user data


if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
    $image_path = NULL;
    $filename = basename($_FILES['avatar']['name']);
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../images/public/' . $filename);
    $image_path = $filename;
}
;

$userId = $_SESSION['user']['id']; 

// Assuming you have a PDO connection in $pdo
if (isset($image_path)) {
    // Prepare the SQL statement
    $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
    
    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindValue(':avatar', $image_path);
    $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Avatar updated successfully.";
        header('location: ../php/profile.php');
        $_SESSION['user']['avatar'] = $image_path;
    } else {
        echo "Error updating avatar: " . implode(", ", $stmt->errorInfo());
    }
}