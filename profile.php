<?php
include("data/db.php");

if(isset($_POST['save'])){
    $n=$_POST['name'];

    $buf=$_FILES['img']['tmp_name'];
    $fn=time().$_FILES['img']['name'];
    move_uploaded_file($buf,"pics/".$fn);


    $g=$_POST['gender'];
    $q=$_POST['qual'];
if(isset($_POST['sub'])){
    $sb=implode(",",$_POST['sub']);
}else{
    $sb="";
}
$e=$_POST['exp'];
$l=$_POST['loc'];
if(isset($_POST['teach'])){
    $t = implode(",", array_map(function($value) use ($con) {
        return mysqli_real_escape_string($con, $value);
    }, $_POST['teach']));
} else {
    $t = "";
}
$s=$_POST['sal'];

$ins=("INSERT INTO teachprofile SET name='$n', timg='$fn',gender='$g',qualification='$q',subjects='$sb',experience='$e',location='$l',preferences='$t',salary='$s'");
if($con->query($ins)){
    header("location:homeprofile.php");
}else{
    echo "Access Denied";
}
}
?>