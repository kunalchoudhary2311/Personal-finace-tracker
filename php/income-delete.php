<?php

include 'inc/database.php';
$db = new database();
$id=$_REQUEST['id'];
$income = $db->delete("income", ['id' => $id]);

if ($income) {
    echo "<script>alert( 'income Deleted!');window.location='income.php';</script>";
} else {
    echo "<script>alert( 'Fail to Delete!');window.location='income.php';</script>";
 
}