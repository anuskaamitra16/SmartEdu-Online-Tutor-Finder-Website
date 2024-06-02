<?php
include("admin_inc/db.php");

$id=$_GET['did'];
$d="DELETE FROM reviews WHERE review_id='$id'";
$con->query($d);
header("location:reviews.php");

?>