<?php
include("admin_inc/db.php");

$id = $_GET['did'];

// Start a transaction
$con->begin_transaction();

try {
    // Delete from studentpost
    $d1 = "DELETE FROM studentpost WHERE student_id = '$id'";
    if (!$con->query($d1)) {
        throw new Exception("Failed to delete from studentpost: " . $con->error);
    }

    // Delete from students
    $d2 = "DELETE FROM students WHERE sid = '$id'";
    if (!$con->query($d2)) {
        throw new Exception("Failed to delete from students: " . $con->error);
    }

    // Commit the transaction
    $con->commit();

    // Redirect to students.php
    header("Location: students.php");
    exit();

} catch (Exception $e) {
    // Rollback the transaction if any query fails
    $con->rollback();
    echo "Failed to delete records: " . $e->getMessage();
}

// Close the connection
$con->close();
?>
