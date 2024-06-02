<?php
include("admin_inc/db.php");

if(isset($_POST['edit'])){
    $n=$_POST['name'];
    $t=$_POST['type'];
    $e=$_POST['email'];
    $p=$_POST['phone'];
    $pr=$_POST['prob'];
    $id=$_POST['id'];

    $up="UPDATE contact SET name='$n',type='$t',email='$e',phone='$p',problem='$pr' WHERE cid='$id'";
    $con->query($up);
    header("location:contactf.php");
     } 


?>