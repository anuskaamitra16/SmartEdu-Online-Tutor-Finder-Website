<?php
include("data/db.php");

if(isset($_POST['savetu'])){
    $n = $_POST['name'];
    $e = $_POST['email'];
    $m = $_POST['mob'];
    $p = md5($_POST['pass']);
    $agree_terms = isset($_POST['agree_terms']) ? $_POST['agree_terms'] : '';

    $ins = "INSERT INTO teachers SET name='$n', email='$e', mobile='$m', password='$p', agreed_terms='$agree_terms'";
    if($con->query($ins)){
        header("location: logint.php");
        exit; // Stop further execution
    } else {
        echo "Error: " . $con->error;
    }
}
?>
