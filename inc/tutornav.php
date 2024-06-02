<?php
 // Start the session
include("data/db.php");
// Function to count unread notifications for the student
function countUnreadNotifications($con, $student_id) {
    $query = "SELECT COUNT(*) AS unread_count FROM teachernotifications WHERE student_id = ? AND status = 'unread'";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $unread_count = $result->fetch_assoc()['unread_count'];
    $stmt->close();
    return $unread_count;
}
if(isset($_SESSION['stu'])) {
    $student_id = $_SESSION['stu'];

// Count unread notifications for the student
$notification_count = countUnreadNotifications($con, $student_id);
} else {
    // If the student is not logged in, set notification count to 0
    $notification_count = 0;
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
                    <li class="nav-item"><a class="nav-link" href="showpost.php">Posts</a></li>
					<li class="nav-item"><a class="nav-link" href="stunoti.php">Notifications<?php if ($notification_count > 0) echo "(" . $notification_count . ")"; ?></a></li>
					<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a onclick="return confirm('Are you sure to logout?')" class="nav-link" href="logoutst.php">Log Out</a></li>
				</ul>
				
			</div>
		</div>
	</nav>
</header>
