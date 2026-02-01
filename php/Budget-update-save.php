<?php
session_start();
include 'inc/database.php';

$db = new Database();
$id=$_REQUEST['budget_id'];
$category= $_POST['category'];
$monthly_limit= $_POST['monthly_limit'];

 

//print_r($_POST);
$user = $db->update("budgets", ['category' => $category, 'monthly_limit' => $monthly_limit], ['budget_id' => $id]);
if ($user) {
    echo "<script>alert( 'Budget Updated!');window.location='Budget.php';</script>";
} else {
    echo "<script>alert( 'Fail to Updated!');window.location='Budget.php';</script>";
 
}