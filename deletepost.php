<?php
include("data/db.php");

// Check if the post ID is provided in the URL
if(isset($_GET['did'])) {
    // Sanitize the post ID
    $id = mysqli_real_escape_string($con, $_GET['did']);

    // Check if the post with the provided ID exists
    $sel = "SELECT * FROM studentpost WHERE pid='$id'";
    $rs = $con->query($sel);

    if($rs->num_rows > 0) {
        // If the post exists, proceed with deletion
        $d = "DELETE FROM studentpost WHERE pid='$id'";
        if($con->query($d)) {
            // If deletion is successful, redirect to the showpost page
            header("location:showpost.php");
            exit(); // Ensure no further code execution after redirection
        } else {
            // If deletion query fails, display an error message
            echo "Error deleting record: " . $con->error;
        }
    } else {
        // If the post doesn't exist, display a message or redirect to an appropriate page
        echo "Post not found.";
    }
} else {
    // If no post ID is provided in the URL, display a message or redirect to an appropriate page
    echo "Post ID not provided.";
}
?>
