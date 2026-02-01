<?php
session_start();
include './inc/database.php';
$user = $_SESSION['user_login'];
$id = $user['id'];
extract($_POST);

$db = new Database();
$admin = $db->insert("income", [
    'user_id'            =>$id,
    'source'             => $source,
    'amount'             => $amount,
    'income_date'        => $income_date,
    'frequency'          =>$frequency
]);
if ($admin) {
  echo "<script>alert( 'Income Added!');window.location='income-add.php';</script>";
} else {
   echo "<script>alert( 'Oops', ' While Adding Income!');window.location='income-add.php';</script>";
   
}

?>