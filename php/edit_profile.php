<?php
require_once "../includes/authorization.php"; 
include '../includes/connect_db.php'; 

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user']['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $sex = $_POST['sex'];

    $sql = "UPDATE users SET name = :name, username = :username, email = :email, phone_number = :phone_number, sex = :sex WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':phone_number', $phone_number);
    $stmt->bindValue(':sex', $sex);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    header ("Location: ../php/profile.php");

} else {
    include "../templates/edit_profile.html.php";
}
$output = ob_get_clean();
include '../templates/layout.html.php'; 