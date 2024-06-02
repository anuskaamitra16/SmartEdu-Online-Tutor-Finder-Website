<?php
include("data/db.php");

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $n = $_POST['name'];
    $g = $_POST['gender'];
    $q = $_POST['qual'];

    if(isset($_POST['sub'])){
        $sb = implode(",", $_POST['sub']);
    } else {
        $sb = "";
    }

    $e = $_POST['exp'];
    $l=$_POST['loc'];

    if(isset($_POST['teach'])){
        $t = implode(",", $_POST['teach']);
    } else {
        $t = "";
    }

    $s = $_POST['sal'];

    // Check if an image is uploaded
    if(isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
        // Move uploaded image to the pics directory
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_fn = time() . $_FILES['img']['name'];
        move_uploaded_file($img_tmp, "pics/" . $img_fn);

        // Update database with the new image filename
        $update_query = $con->prepare("UPDATE teachprofile SET name=?, gender=?, qualification=?, subjects=?, experience=?,location=?, preferences=?, salary=?, timg=? WHERE teid=?");
        $update_query->bind_param("sssssssssi", $n, $g, $q, $sb, $e,$l, $t, $s, $img_fn, $id);
    } else {
        // No image uploaded, update database without image filename
        $update_query = $con->prepare("UPDATE teachprofile SET name=?, gender=?, qualification=?, subjects=?, experience=?,location=?, preferences=?, salary=? WHERE teid=?");
        $update_query->bind_param("ssssssssi", $n, $g, $q, $sb, $e,$l, $t, $s, $id);
    }

    // Execute the update query
    if($update_query->execute()){
        header("location: homeprofile.php");
    } else {
        echo "Failed to update profile.";
    }

    // Close the prepared statement
    $update_query->close();
}

// Close database connection
$con->close();
?>
