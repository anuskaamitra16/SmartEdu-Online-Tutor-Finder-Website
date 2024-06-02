<?php
include("admin_inc/db.php");

$id=$_GET['did'];
$d="DELETE FROM contact WHERE cid='$id'";
$con->query($d);
header("location:contactf.php");

?>