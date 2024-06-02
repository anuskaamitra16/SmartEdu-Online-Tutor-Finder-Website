<?php
include("data/db.php");

if(isset($_POST['edit'])){
    $n = $_POST['name'];
    $c=$_POST['class'];

    if(isset($_POST['sub'])){
        $sb = implode(",", $_POST['sub']);
    } else {
        $sb = "";
    }

    $p=$_POST['phone'];
    $l=$_POST['location'];
    $b=$_POST['budget'];
    $i=$_POST['info'];

    $id=$_POST['id'];


$up = "UPDATE studentpost SET name='$n', class='$c', subjects='$sb', phone='$p', location='$l', budget='$b', info='$i' WHERE pid='$id'";

if($con->query($up)){
    header("location:showpost.php");
}else{
    echo "Access Denied";
}


}


?>