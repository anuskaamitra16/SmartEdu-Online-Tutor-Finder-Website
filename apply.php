<?php
include("data/db.php"); // Include your database connection file

// Start the session
session_start();

if(isset($_GET['sid']) && isset($_GET['pid'])) {
    $student_id = $_GET['sid'];
    $post_id = $_GET['pid'];
    // Now you have both student_id and post_id

    // Check if student ID is set in the session
    if(isset($_SESSION['tea'])) {
        // Get the student's ID from the session
        $teacher_id = $_SESSION['tea'];

        // Check if the student has already requested this tutor
        $check_query = "SELECT * FROM studentrequests WHERE teacher_id = $teacher_id AND post_id = $post_id";
        $check_result = $con->query($check_query);

        if($check_result->num_rows == 0) {
            // Student has not yet requested this tutor, proceed to request

            // Insert request into the requests table
            $insert_query = "INSERT INTO studentrequests (teacher_id,post_id) VALUES ('$teacher_id','$post_id')";
            $insert_result = $con->query($insert_query);

            if($insert_result) {
                // Insert notification into the notifications table
                $message = "You have received an application from a teacher";
                $insert_notification_query = "INSERT INTO teachernotifications (teacher_id,student_id,pid, message) VALUES ('$teacher_id','$student_id','$post_id','$message')";
                $notification_result = $con->query($insert_notification_query);

                if($notification_result) {
                    // Redirect back to the findtutor.php page with success message
                    header("location: jobpost.php");
                    exit(); // Stop executing the rest of the script
                } else {
                    echo "Error sending notification.";
                }
            } else {
                echo "Error sending request. Please try again.";
            }
        } else {
            echo "You have already requested this tutor.";
        }
    } else {
        echo "Teacher ID not provided.";
    }
} else {
    echo "Student ID not provided.";
}
?>
