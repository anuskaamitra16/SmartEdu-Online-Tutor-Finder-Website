<?php
session_start();
include("data/db.php");

if(isset($_POST['save'])){
    $n=$_POST['name'];
    $c=$_POST['class'];
if(isset($_POST['sub'])){
    $sb=implode(",",$_POST['sub']);
}else{
    $sb="";
}
$p=$_POST['phone'];
$l=$_POST['location'];
$b=$_POST['budget'];
$i=$_POST['info'];

// Assuming $_SESSION['stu'] contains the sid of the logged-in student
$student_id = $_SESSION['stu'];

// Insert post with the student_id obtained from the session
$ins = "INSERT INTO studentpost (student_id, name, class, subjects, phone, location, budget, info) VALUES ('$student_id', '$n', '$c', '$sb', '$p', '$l', '$b', '$i')";

if($con->query($ins)){
    header("location:showpost.php");
}else{
    echo "Access Denied";
}
}
?>