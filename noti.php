<?php
include("data/db.php"); // Include your database connection file

// Start the session
session_start();

// Check if tid is set in the URL
if(isset($_GET['tid'])) {
    // Get the teacher's ID from the URL
    $teacher_id = $_GET['tid'];

    // Check if student ID is set in the session
    if(isset($_SESSION['stu'])) {
        // Get the student's ID from the session
        $student_id = $_SESSION['stu'];

        // Check if the student has already requested this tutor
        $check_query = "SELECT * FROM teachrequests WHERE student_id = $student_id AND teacher_id = $teacher_id";
        $check_result = $con->query($check_query);

        if($check_result->num_rows == 0) {
            // Student has not yet requested this tutor, proceed to request

            // Insert request into the requests table
            $insert_query = "INSERT INTO teachrequests (student_id, teacher_id) VALUES ('$student_id', '$teacher_id')";
            $insert_result = $con->query($insert_query);

            if($insert_result) {
                // Insert notification into the notifications table
                $message = "You have received a tuition request from student ID: $student_id";
                $insert_notification_query = "INSERT INTO notifications (sender_id, receiver_id, message) VALUES ('$student_id', '$teacher_id', '$message')";
                $notification_result = $con->query($insert_notification_query);

                if($notification_result) {
                    // Redirect back to the findtutor.php page with success message
                    header("location: findtutor.php");
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
        echo "Student ID not provided.";
    }
} else {
    echo "Teacher ID not provided.";
}
?>
