<?php
// Include your database connection file
include("data/db.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the notification ID from the form
    $notification_id = $_POST['notification_id'];

    // Update the status of the notification in the database
    $update_query = "UPDATE teachernotifications SET status = 'read' WHERE notification_id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("i", $notification_id);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the notifications page or any other appropriate page
    header("Location: stunoti.php");
    exit();
}
?>
