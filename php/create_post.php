<?php
require '../includes/authorization.php';
include '../includes/connect_db.php'; 
include '../includes/queries/modules.php';
$title = "Post";
ob_start();

if(isset($_POST['post'])) {
    $module = $_POST['module'];
    $user = $_SESSION['user']['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $post_date = 
    date_default_timezone_set('Asia/Bangkok'); // Set the timezone to UTC+7
    $current_date = date('H:i d M Y'); // Get the current date and time in the specified format
    echo "Current date and time in UTC+7: " . $current_date;
    
    $image_path = NULL;
    if(isset($_FILES['image_path']) && $_FILES['image_path']['error'] === 0) {
        $filename = basename($_FILES['image_path']['name']); 
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../images/post_images/'. $filename);
        $image_path = $filename;
    }

    $sql = "INSERT INTO posts (module_id, user_id, title, content, image_path, post_date)
            VALUES (:module, :user, :title, :content, :image_path, :post_date)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':module', $module);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':image_path', $image_path);
    $stmt->bindParam(':post_date', $post_date);
    $stmt->execute();
    header("location: ../php/home.php");

} else {
    $sql = "SELECT * FROM modules";
    $modules = $pdo->query($sql);
}
include '../templates/create_post.html.php';
$output = ob_get_clean();
include "../templates/layout.html.php";
