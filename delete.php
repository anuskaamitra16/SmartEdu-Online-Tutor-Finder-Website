<?php
include("data/db.php");

$id = $_GET['did'];

// Start a transaction
$con->begin_transaction();

try {
    // Fetch the record from teachprofile to unlink the image
    $sel = "SELECT * FROM teachprofile WHERE teid = '$id'";
    $rs = $con->query($sel);
    if ($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        // Unlink the image file
        unlink("pics/" . $row['timg']);
    } else {
        throw new Exception("Record not found in teachprofile.");
    }

    // Delete from teachprofile
    $d1 = "DELETE FROM teachprofile WHERE teid = '$id'";
    if (!$con->query($d1)) {
        throw new Exception("Failed to delete from teachprofile: " . $con->error);
    }

    // Delete from teachers
    $d2 = "DELETE FROM teachers WHERE tid = '$id'";
    if (!$con->query($d2)) {
        throw new Exception("Failed to delete from teachers: " . $con->error);
    }

    // Commit the transaction
    $con->commit();

    // Redirect to index.php
    header("Location: index.php");
    exit();

} catch (Exception $e) {
    // Rollback the transaction if any query fails
    $con->rollback();
    echo "Failed to delete records: " . $e->getMessage();
}

// Close the connection
$con->close();
?>
