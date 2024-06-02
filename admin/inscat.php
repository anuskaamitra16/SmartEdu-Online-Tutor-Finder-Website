<?php
include("admin_inc/db.php");

if(isset($_POST['save'])){
    $c=$con->real_escape_string($_POST['cname']);
    $ins="INSERT INTO categories SET cat_name='$c'";
    $con->query($ins);
    header("location:listcategory.php");

}else{
    echo "Access Denied";
}
?>