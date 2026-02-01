<?php
session_start();
include './inc/database.php';
$user = $_SESSION['user_login'];
$id = $user['id'];
extract($_POST);

$db = new Database();
$admin = $db->insert("expense", [
    'user_id'            =>$id,
    'category'            => $category,
    'expense_amount'             => $amount,
    'description'             => $description,
    'expense_date'        => $expense_date,
    
]);
if ($admin) {
  echo "<script>alert( 'Expense Added!');window.location='Expense-add.php';</script>";
} else {
   echo "<script>alert( 'Oops', ' While Adding Expense!');window.location='Expense-add.php';</script>";
   
}

?>