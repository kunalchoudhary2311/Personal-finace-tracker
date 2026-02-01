<?php
session_start();
include './inc/database.php';
$user = $_SESSION['user_login'];
$id = $user['id'];
extract($_POST);

$db = new Database();
$admin = $db->insert("budgets", [
    'user_id'            =>$id,
    'category'            => $category,
    'monthly_limit'       => $monthly_limit,
   
    
]);
if ($admin) {
  echo "<script>alert( 'Budgets Added!');window.location='Budget-add.php';</script>";
} else {
   echo "<script>alert( 'Oops', ' While Adding Budgets');window.location='Budget-add.php';</script>";
   
}

?>