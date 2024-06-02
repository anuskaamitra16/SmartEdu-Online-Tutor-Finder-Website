<?php
session_start(); // Start the session

// Include your database connection file
include("data/db.php");

// Check if the user is logged in
if (!isset($_SESSION['tea'])) {
    header("Location: login.php");
    exit();
}

// Get the teacher's ID
$teacher_id = $_SESSION['tea'];

// Fetch notifications for the teacher along with sender names
$query = "SELECT n.notification_id, n.message, n.timestamp, n.status, s.name AS sender_name
FROM notifications n
INNER JOIN students s ON n.sender_id = s.sid
WHERE n.receiver_id = ?
ORDER BY n.timestamp DESC
";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are notifications
if ($result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>SmartEDU- Online Tutor Finder</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body{
            background-color:#fff0f5;
        }
                .notifications {
        max-width: 650px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom:40px;
        background-color: #e6e6e6; /* Different background color */

    }

    .notification {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .notification p {
        margin: 5px 0;
    }

    .notification form {
        margin-top: 10px;
    }

    .notification input[type="text"],
    .notification button {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-right: 10px;
    }

    .notification button {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }
    h1 {
            
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top:15px;
                }
                .accepted {
    background-color: #28a745; /* Green background color */
    color: #fff; /* White text color */
    padding: 3px 8px; /* Adjusted padding */
    border-radius: 5px; /* Rounded corners */
    width: 15%;
    text-align:center;
}
.pending{
    background-color:red;
    width:15%;
    text-align :center;
    color:#fff;
    padding: 3px 8px; /* Adjusted padding */
    border-radius: 5px; /* Rounded corners */
    
}
</style>

        </style>
    </head>
    <body class="host_version"> 

<!-- LOADER -->
<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	

<!-- Start header -->
<?php include("inc/notinav.html"); ?>
		<!-- End header -->
	

        <h1>Student Request Notifications</h1>
<div class="notifications">
    <?php

    // Loop through each notification and display it
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="notification">
            <p><strong>From:</strong> <?php echo $row['sender_name']; ?></p>
            <p><strong>Message:</strong> You have got a tuition request from <?php echo $row['sender_name']; ?> </p>
            <p><strong>Timestamp:</strong> <?php echo $row['timestamp']; ?></p>
            <?php if ($row['status'] == 'unread'): ?>
                <form action="insnoti.php" method="POST">
                    <input type="hidden" name="notification_id" value="<?php echo $row['notification_id']; ?>">
                    <button type="submit" name="accept">Accept</button>
                </form>
            <?php else: ?>
                <p class="accepted">Accepted</p>

            <?php endif; ?>
            <form action="insnoti.php" method="POST">
                <input type="hidden" name="notification_id" value="<?php echo $row['notification_id']; ?>">
                <input type="text" name="msg" placeholder="Send a reply">
                <button type="submit" name="reply">Send</button>
            </form>
        </div>
        <?php
    }
    ?>
</div>



<h1>Application Acceptance Notifications</h1>
<div class="notifications">
    <?php
    // Get the teacher's ID
$teacher_id = $_SESSION['tea'];

// Fetch notifications for the teacher along with sender names
$query = "SELECT n.notification_id, n.message, n.timestamp, n.status, s.name AS sender_name
FROM teachernotifications n
INNER JOIN students s ON n.student_id = s.sid
WHERE n.teacher_id = '$teacher_id'
ORDER BY n.timestamp DESC
";
$stmt = $con->prepare($query);
//$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();
    // Loop through each notification and display it
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="notification">
            <?php if ($row['status'] == 'unread'): ?>
                <p><strong>Student Name:</strong> <?php echo $row['sender_name']; ?></p>
            <p><strong>Message:</strong> Your application is yet to be accepted by <?php echo $row['sender_name']; ?> </p>
            <p><strong>Timestamp:</strong> <?php echo $row['timestamp']; ?></p>
            
                <p class="pending">Pending</p>
            <?php else: ?>
                <p><strong>Student Name:</strong> <?php echo $row['sender_name']; ?></p>
            <p><strong>Message:</strong> Your application got accepted by <?php echo $row['sender_name']; ?> </p>
            <p><strong>Timestamp:</strong> <?php echo $row['timestamp']; ?></p>
            
                <p class="accepted">Accepted</p>

            <?php endif; ?>
            
        </div>
        <?php
    }
    ?>
</div>


    <!-- start footer -->
    <?php include("inc/footer.html"); ?>
    <!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2024 <a href="index.php">SmartEDU</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>


    <?php
} 
?>
