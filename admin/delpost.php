<?php
include("admin_inc/db.php");

$id=$_GET['did'];
$d="DELETE FROM studentpost WHERE pid='$id'";
$con->query($d);
header("location:poststudents.php");

?>