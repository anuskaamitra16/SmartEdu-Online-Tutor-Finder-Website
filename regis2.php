<?php
include("data/db.php");

if(isset($_POST['savest'])){
    $n = $_POST['name'];
    $t = $_POST['type'];
    $e = $_POST['email'];
    $m = $_POST['mob'];
    $p = md5($_POST['pass']);
    $agree_terms = isset($_POST['agree_terms']) ? $_POST['agree_terms'] : '';

    $ins = "INSERT INTO students SET name='$n', type='$t', email='$e', mobile='$m', password='$p', agreed_terms='$agree_terms'";
    if($con->query($ins)){
        header("location: loginst.php");
        exit; // Stop further execution
    } else {
        echo "Error: " . $con->error;
    }
}
?>
