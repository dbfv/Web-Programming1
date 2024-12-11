<?php 
session_start();
if (!isset($_SESSION['Validated']) && $_SESSION['Validated'] != TRUE) {
    header('Location: ../php/login.php');
}
