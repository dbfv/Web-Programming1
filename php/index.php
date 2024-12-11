<?php 
require_once "../includes/authorization.php";

$title = "Home";
ob_start();
$output = ob_get_clean();
header('Location: ../php/home.php');