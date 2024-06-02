<?php
session_start(); // Start the session

// Include your database connection file
include("data/db.php");

// Function to count unread notifications for the student
function countUnreadNotifications($con, $student_id) {
    $query = "SELECT 
                (SELECT COUNT(*) FROM teachernotifications WHERE student_id = ? AND status = 'unread') AS unread_notification_count,
                (SELECT COUNT(*) FROM notifications WHERE sender_id = ? AND status = 'read') AS unread_reply_count";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ii", $student_id, $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $counts = $result->fetch_assoc();
    $unread_notification_count = $counts['unread_notification_count'];
    $unread_reply_count = $counts['unread_reply_count'];
    $stmt->close();
    return array($unread_notification_count, $unread_reply_count);
}

// Check if the student is logged in
if(isset($_SESSION['stu'])) {
    $student_id = $_SESSION['stu'];

    // Count unread notifications for the student
    list($notification_count, $reply_count) = countUnreadNotifications($con, $student_id);
    $total_unread_count = $notification_count + $reply_count;
} else {
    // If the student is not logged in, set notification count to 0
    $total_unread_count = 0;
}
?>

<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color: white;" class="m-0 text-white">
                <img src="images/headlogo.png" alt="" />SmartEDU - Online Tutor Finder
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['stu'])): ?>
                        <?php
                            // Retrieve student's name based on their ID
                            $student_id = $_SESSION['stu'];
                            $query = "SELECT name FROM students WHERE sid = ?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("i", $student_id);
                            $stmt->execute();
                            $stmt->bind_result($student_name);
                            $stmt->fetch();
                            $stmt->close();
                        ?>
                        <li class="nav-item"><span class="nav-link">Welcome, <?php echo $student_name; ?></span></li>
                        <li class="nav-item"><a class="nav-link" href="newpost.php">Add Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="findtutor.php">Find Tutors</a></li>
                        <li class="nav-item"><a class="nav-link" href="stunoti.php">Notifications <?php if ($total_unread_count > 0) echo "(" . $total_unread_count . ")"; ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="review.php">Rate & Review</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="contactst.php">Contact</a></li>
                        <li class="nav-item"><a onclick="return confirm('Are you sure to logout?')" class="nav-link" href="logoutst.php">Log Out</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
