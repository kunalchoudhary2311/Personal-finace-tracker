<?php
session_start();
include 'inc/database.php';

$db = new Database();
$id=$_REQUEST['expense_id'];
$category= $_POST['category'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$expense_date   = $_POST['expense_date'];

 

//print_r($_POST);
$user = $db->update("expense", ['category' => $category, 'expense_amount' => $amount ,'description'=> $description,'expense_date'=> $expense_date,], ['expense_id' => $id]);
if ($user) {
    echo "<script>alert( 'Expense Updated!');window.location='expense.php';</script>";
} else {
    echo "<script>alert( 'Fail to Updated!');window.location='expense.php';</script>";
 
}