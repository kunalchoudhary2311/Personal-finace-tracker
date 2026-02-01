<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include 'inc/database.php';


if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user_login'];
$id = $user['id'];

$db = new Database();

$old_password = $_POST['old_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
    echo "Please fill all password fields.";
    exit;
}


$admin = $db->get("users", "*", ['id' => $id]);


if (!password_verify($old_password, $admin['Password'])) {
    echo "Old password is incorrect.";
    echo "<script>window.history.back();</script>";
    exit;
}


if ($new_password !== $confirm_password) {
    echo "New password and confirm password do not match.";
    echo "<script>window.history.back();</script>";
    exit;
}


$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
$update = $db->update("users", ['Password' => $hashed_password], ['id' => $id]);

if ($update) {
    echo "Password updated successfully!";
    echo "<script>window.location='login.php';</script>";
    exit;
} else {
    echo "Failed to update password. Try again.";
    exit;
}
?>
