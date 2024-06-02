<?php
include("admin_inc/db.php");

if(isset($_POST['editst'])){
    $n=$_POST['name'];
    $t=$_POST['type'];
    $e=$_POST['email'];
    $m=$_POST['mobile'];
    $id=$_POST['id'];

    $up="UPDATE students SET name='$n',type='$t',email='$e',mobile='$m' WHERE sid='$id'";
    $con->query($up);
    header("location:students.php");
     } 


?>