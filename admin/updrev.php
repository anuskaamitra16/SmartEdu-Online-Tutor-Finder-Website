<?php
include("admin_inc/db.php");

if (isset($_POST['editrev'])) {
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];
    $review_id = $_POST['review_id'];

    $up = "UPDATE reviews SET rating='$rating', review_text='$review_text' WHERE review_id='$review_id'";
    $con->query($up);
    header("location:reviews.php");
}
?>
