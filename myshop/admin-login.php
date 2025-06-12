<?php
session_start();

$admin_username = "admin";
$admin_password = "admin123";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $admin_username && $password === $admin_password) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin.php");
    exit();
} else {
    header("Location: admin-login.html?error=1");
    exit();
}
?>