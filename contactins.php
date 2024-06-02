<?php
include("data/db.php");
if(isset($_POST['submit'])){
    $n=$_POST['name'];
    $t=$_POST['type'];
    $e=$_POST['email'];
    $p=$_POST['phone'];
    $r=$_POST['problem'];

    $ins="INSERT INTO contact SET name='$n',type='$t',email='$e',phone='$p',problem='$r'";
    if($con->query($ins)){
        echo "<script>alert('Message sent successfully');</script>";

        echo "<script>setTimeout(function(){window.location.href='contact.php';}, 0000);</script>";
    }else{
        echo"cannot insert";
    }
}
?>
