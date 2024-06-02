<?php
// Include your database connection file
include("data/db.php");
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Check if the form is submitted
if (isset($_POST['send'])) {
    // Get form data
    $teacher_id = $_POST['teacher_id'];
    $student_id = $_SESSION['stu']; // Assuming you have student_id stored in session
    $rating = $_POST['rating'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $comment = $_POST['comment'];

    // Prepare and execute SQL query to insert data into the reviews table
    $insert_query = "INSERT INTO reviews SET teacher_id='$teacher_id', student_id='$student_id', rating='$rating', q1='$question1', q2='$question2', q3='$question3', q4='$question4', review_text='$comment'";
    
    if ($con->query($insert_query) === TRUE) {
                // Display a popup message using JavaScript
                echo '<script>alert("Review submitted successfully.");</script>';
                // Redirect to review.php after a delay
                echo '<script>window.setTimeout(function() { window.location.href = "showreview.php"; }, 0000);</script>';
    } else {
        echo "Error: " . $insert_query . "<br>" . $con->error;
    }
}
?>
