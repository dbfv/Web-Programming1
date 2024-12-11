<?php 
session_start();
include "../includes/connect_db.php";

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$sql = "SELECT * FROM users WHERE username = :username";
$statement = $pdo->prepare($sql);
$statement->bindValue(':username', $username);
$statement->execute();

$user = $statement->fetch();

if (isset($user) && $password == $user['password']) {
    session_start();
    $_SESSION['Authorized'] = TRUE;
    $_SESSION['user'] = $user;
    header("Location: index.php");
    exit;
} else {
    $_SESSION['status'] = 'Invalid username or password.';
    header("Location: ../templates/login.html.php");
    exit;
}

