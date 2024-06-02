<?php
// Include your database connection file
include("data/db.php");

// Check if accept button is clicked
if(isset($_POST['accept'])) {
    // Get the notification ID from the form
    $notification_id = $_POST['notification_id'];
    
    // Update the status of the notification in the database
    $update_query = "UPDATE notifications SET status = 'read' WHERE notification_id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("i", $notification_id);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the notifications page
    header("location: shownoti.php");
    exit();
}

// Check if reply button is clicked
if(isset($_POST['reply'])){
    // Get the reply message from the form
    $reply_message = $_POST['msg'];
    
    // Get the notification ID from the form
    $notification_id = $_POST['notification_id'];
    
    // Update the reply message in the database
    $update_query = "UPDATE notifications SET reply = ? WHERE notification_id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("si", $reply_message, $notification_id);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the notifications page
    header("location: shownoti.php");
    exit();
}
?>
