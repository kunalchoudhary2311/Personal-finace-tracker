<?php
session_start();
include 'inc/database.php';

$db = new Database();
$id=$_REQUEST['id'];
$source = $_POST['source'];
$amount = $_POST['amount'];
$income_date   = $_POST['income_date'];
$frequency = $_POST['frequency'];
 

//print_r($_POST);
$user = $db->update("income", ['source' => $source, 'amount' => $amount ,'income_date'=> $income_date,'frequency'=> $frequency], ['id' => $id]);
if ($user) {
    echo "<script>alert( 'income Updated!');window.location='income.php';</script>";
} else {
    echo "<script>alert( 'Fail to Updated!');window.location='income.php';</script>";
 
}