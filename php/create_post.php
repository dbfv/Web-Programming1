<?php
include 'connect_db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module_id = $_POST['module']; // Get the selected module ID
    $content = $_POST['content'];
    $image = $_FILES['image'];

    // Handle image upload if an image is provided
    if ($image['error'] == 0) {
        $target_dir = "../images/post_images";
        $target_file = $target_dir . basename($image["name"]);
        move_uploaded_file($image["tmp_name"], $target_file);
    } else {
        $target_file = null; // No image uploaded
    }

    // Insert the post into the database
    $stmt = $pdo->prepare("INSERT INTO posts (module_id, content, image) VALUES (:module_id, :content, :image)");
    $stmt->execute(['module_id' => $module_id, 'content' => $content, 'image' => $target_file]);

    // Redirect back to the main page or wherever you want
    header("Location: index.php");
    exit();
}
?>