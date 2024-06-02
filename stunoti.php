<?php
// Include your database connection file
include("data/db.php");

// Fetch notifications for the current student
session_start();
if(isset($_SESSION['stu'])) {
    $student_id = $_SESSION['stu'];

    $query = "SELECT tn.*, t.name AS teacher_name, sp.name AS post_name 
    FROM teachernotifications tn
    INNER JOIN teachers t ON tn.teacher_id = t.tid
    INNER JOIN studentpost sp ON tn.pid = sp.pid
    WHERE tn.student_id = ?
    ORDER BY tn.timestamp DESC
    ";

    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
 $n= "SELECT n.reply, t.name AS teacher_name
 FROM notifications n
 JOIN teachers t ON n.receiver_id = t.tid
 WHERE n.sender_id = '$student_id'";
 $result1=$con->query($n);
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
                .notifications {
        max-width: 810px; /* Adjust the width as needed */
        margin: 20px auto; /* Center the notifications */
        padding: 20px;
        background-color: #f5f5f5; /* Light gray background */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        margin-bottom:50px;
    }

    /* Style for each individual notification */
    .notification {
        margin-bottom: 15px; /* Add some space between notifications */
        padding: 15px;
        background-color: #fffacd;

        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a slight shadow */
    }

    /* Style for notification title */
    .notification-title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Style for notification message */
    .notification-message {
        margin-bottom: 10px;
    }

    /* Style for notification timestamp */
    .notification-timestamp {
        font-size: 12px;
        color: #777; /* Gray color */
    }

    /* Style for notification status */
    .notification-status {
        font-size: 12px;
        font-weight: bold;
        color: green; /* Green color for read notifications */
    }
    body {
    background-color: #e0f2e9; /* Light green */
}

button[name="apply"] {
    background-color: #007bff; /* Blue */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 1px 2px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
        /* Apply button hover effect */
        button[name="apply"]:hover {
        background-color: #0056b3; /* Darker shade of blue */
    }
    .applied-button {
    background-color: green;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: not-allowed;
    border-radius: 5px;
}
.button-container {
    display: flex;
    margin-top: 10px; /* Adjust as needed */
}

.button-container a {
    margin-right: 10px; /* Adjust as needed */
}
.reply {
    margin-bottom: 15px; /* Add some space between notifications */
        padding: 15px;
        background-color: #fffacd;

        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a slight shadow */
}
    .reply p {
        margin-bottom: 10px;
    }



    </style>
    </head>
    <body class="host_version"> 


<!-- Start header -->
<?php include("inc/stunotinav.html"); ?>
		<!-- End header -->
        <h1>Teacher Application Notifications</h1>
        <div class="notifications">
    <?php
    // Display notifications
    while ($row = $result->fetch_assoc()) {
        echo "<div class='notification'>";
        echo "<p class='notification-title'><strong>From " . $row['teacher_name'] . ":</strong></p>";
        echo "<p class='notification-message'>" . $row['message'] . " for the post of <strong>" . $row['post_name'] . "</strong></p>";

        echo "<p class='notification-timestamp'><strong>Timestamp:</strong> " . $row['timestamp'] . "</p>";
            // Check if the notification is unread
    if ($row['status'] == 'unread') {
        // If unread, display the accept button
        echo "<form action='accept_notification.php' method='post'>";
        echo "<input type='hidden' name='notification_id' value='" . $row['notification_id'] . "'>";
        echo "<button type='submit' name='apply'>Accept</button>";
        echo "</form>";
    } else {
        // If read, display the "Accepted" label
        echo "<button type='button' class='applied-button' disabled>Accepted</button>";
    }
    // Add "Check Teacher Profile" button
    echo "<div class='button-container'>";
    echo "<a href='teacher_profile.php?teacher_id=" . $row['teacher_id'] . "' class='btn btn-primary' style='padding: 8px 16px;'>Check Teacher Profile</a>";
    echo "</div>";
    
        echo "</div>";
    }?>

    </div>
    <h1>Request Acceptance Notifications</h1>
        <div class="notifications">
    <?php
    if($result1->num_rows>0){
        // Loop through each notification
        while ($row1 = $result1->fetch_assoc()) {
            // Display the reply to the student
            echo "<div class='reply'>";
        echo "<p>You got accepted by the teacher <strong>".$row1['teacher_name']."</strong></p>";
        echo "<p><strong>Reply: </strong>". $row1['reply']."</p>";
        echo "</div>";
        }
    } else {
        // If no notifications found, display a message
        echo "No notifications found.";
    }
    ?>
    
</div>
<?php
// Update notification status to mark them as read

// Close the statement and database connection
$stmt->close();
$con->close();
} else {
echo "Student ID not found.";
}
?>


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
