<?php
include './inc/database.php';

$Name     = $_POST['Name'];
$Email_id = $_POST['Email_id'];
$Password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
$token    = bin2hex(random_bytes(32));

$db = new Database();

// 1. Check if email already exists
$existing = $db->select("users", "*", ['Email_id' => $Email_id]);

if (!empty($existing)) {
    // Email already registered
    echo "Email already registered. <a href='login.php'>Go to Login</a>";
    exit;
}

// 2. Insert new user
$admin = $db->insert("users", [
    'Name'               => $Name,
    'Email_id'           => $Email_id,
    'Password'           => $Password,
    'verification_token' => $token
]);

// 3. Create verification link
$link = "http://localhost/Personal finace tracker/php/verify.php?token=$token";

// 4. Display dev-mode verification link
echo "<p><strong>Verification link (dev mode):</strong></p>";
echo "<a href='$link'>$link</a>";

// Optional: log to file
file_put_contents("email_logs.txt", "Verify: $link\n", FILE_APPEND);

echo "<br><br>Registration successful! Check your email for verification.";
?>
