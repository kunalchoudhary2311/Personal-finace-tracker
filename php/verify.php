<?php
include './inc/database.php';
$token =$_GET['token'];

$db = new Database();
$admin = $db->update(
    "users",                                  
    ['is_verified' => 1, 'verification_token' => NULL],  
    ['verification_token' => $token]       
);

echo "Email verified. <a href=login.php>Login</a>";
?>