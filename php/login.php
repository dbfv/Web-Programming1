<?php 
ob_start();
include "../includes/connect_db.php";
include "../templates/login.html.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = :username";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':username', $username);
    $statement->execute();

    $user = $statement->fetch();

    if (isset($user) && $password == $user['password']) {
        $_SESSION['Validated'] = TRUE;
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['status'] = 'Invalid username or password.';
        header("Location: ../templates/login.html.php");
        exit;
    }
}
?>