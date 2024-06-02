<?php
include("admin_inc/db.php");

$id=$_GET['did'];
$d="DELETE FROM categories WHERE cid='$id'";
$con->query($d);
header("location:listcategory.php");

?>