<?php

include 'inc/database.php';
$db = new database();
$expense_id=$_REQUEST['expense_id'];
$expense = $db->delete("expense", ['expense_id' => $expense_id]);

if ($expense) {
    echo "<script>alert( 'Expense Deleted!');window.location='expense.php';</script>";
} else {
    echo "<script>alert( 'Fail to Delete!');window.location='expense.php';</script>";
 
}