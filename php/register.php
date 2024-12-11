<?php
include "../includes/connect_db.php";
include "../templates/register.html.php";
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // Check if any fields are empty
    if ($username == "" || $email == "" || $password == "" || $confirm_password == "") {
        $_SESSION['status'] = 'Please fill in all fields!';
        header('location:../php/register.php');
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['status'] = 'Password and Confirm Password do not match!';
        header('location:../php/register.php');
        exit();
    }

    // Check if username already exists
    $query = "SELECT * FROM users WHERE username = :username";
    $statement = $pdo->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $is_existed_user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($is_existed_user) {
        $_SESSION['status'] = 'This username is in use, please choose another one!';
        header('location:../php/register.php');
        exit();
    }

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $is_existed_email = $statement->fetch(PDO::FETCH_ASSOC);

    if ($is_existed_email) {
        $_SESSION['status'] = 'This email address has already existed, please choose another one!';
        header('location:../php/register.php');
        exit();
    }

    // Hash the password
    $password = md5($password);

    // Insert new user into the database
    $sql = "INSERT INTO users (email, password, username) VALUES(:email, :password, :username)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->bindValue(":username", $username);
    $statement->execute();
    header('location: ../php/login.php');
    exit();
}
?>