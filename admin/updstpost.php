<?php
include("admin_inc/db.php");

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $subjects = implode(",", $_POST['sub']);
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $budget = $_POST['bud'];
    $info = $_POST['info'];

    // Update the student post details in the database
    $update_query = "UPDATE studentpost SET name='$name', class='$class', subjects='$subjects', phone='$phone', location='$location', budget='$budget', info='$info' WHERE pid='$id'";

    // Execute the update query
    if($con->query($update_query)){
        header("location: poststudents.php");
    } else {
        echo "Error updating student post: " . $con->error;
    }
}

// Close database connection
$con->close();
?>
