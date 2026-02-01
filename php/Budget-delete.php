<?php

include 'inc/database.php';
$db = new database();
$budget_id=$_REQUEST['budget_id'];
$expense = $db->delete("budgets", ['budget_id' => $budget_id]);

if ($expense) {
    echo "<script>alert( 'budget Deleted!');window.location='Budget.php';</script>";
} else {
    echo "<script>alert( 'Fail to Delete!');window.location='Budget.php';</script>";
 
}