<?php
include("admin_inc/db.php");

if(isset($_POST['edit'])){
    $n=$_POST['name'];
    $e=$_POST['email'];
    $m=$_POST['mobile'];
    $id=$_POST['id'];

    $up="UPDATE teachers SET name='$n',email='$e',mobile='$m' WHERE tid='$id'";
    $con->query($up);
    header("location:teachers.php");
     } 


?>