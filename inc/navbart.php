<?php
// Include your database connection file
include("data/db.php");

// Function to get the notification count
function getNotificationCount() {
    global $con;
    if(isset($_SESSION['tea'])) {
        $teacher_id = $_SESSION['tea'];
        $query = "SELECT COUNT(*) AS count FROM notifications WHERE receiver_id = ? AND status = 'unread'";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $teacher_id);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count;
    }
    return 0;
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
					<?php if(isset($_SESSION['tea'])): ?>
                        <?php
                            $tid = $_SESSION['tea'];
                            $query = "SELECT name FROM teachers WHERE tid = ?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("i", $tid);
                            $stmt->execute();
                            $stmt->bind_result($tname);
                            $stmt->fetch();
                            $stmt->close();
                        ?>
                        <li class="nav-item"><span class="nav-link">Welcome, <?php echo $tname; ?></span></li>
                    
					<li class="nav-item"><a class="nav-link" href="shownoti.php">Notifications 
                    <?php 
                    // Display the notification count
                    $notificationCount = getNotificationCount();
                    if($notificationCount > 0) {
                        echo '(' . $notificationCount . ')';
                    }
                    ?>
                    </a></li>
					<li class="nav-item"><a class="nav-link" href="jobpost.php">Job Posts</a></li>
					<li class="nav-item"><a class="nav-link" href="contacttea.php">Contact</a></li>
					<li class="nav-item"><a onclick="return confirm('Are you sure to logout?')" class="nav-link" href="logoutt.php">Log Out</a></li>
					<?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
                
            </div>
        </div>
    </nav>
</header>
