<?php
include("data/db.php");
session_start();
// Check if the user is logged in
if (!isset($_SESSION['tea'])) {
    // Redirect to the login page if not logged in
    header("Location: logint.php");
    exit();
}
// Retrieve the user ID from the session
$user_id = $_SESSION['tea']; // Use the 'tea' key to fetch the teacher's ID

// Query to fetch profile details based on user ID
$query = "SELECT * FROM teachers AS t
          INNER JOIN teachprofile AS tp ON t.tid = tp.teid 
          WHERE t.tid = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();


$result = $stmt->get_result();

// Fetch profile details
if ($result->num_rows > 0) {
    $profile_details = $result->fetch_assoc();
} else {
    // Display message if profile not found
    echo "Profile not found.";
}
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
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #efe3fd; 
    margin: 0;
    padding: 0;
}

.container1 {
    max-width: 710px;
    margin: 50px auto;
    padding: 30px;
    padding-bottom:15px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(1, 1, 0, 0.5); /* Subtle box shadow */
}

.profile-section {
    margin-bottom: 30px;
    border-bottom: 1px solid #ddd; /* Adding a border to separate sections */
    padding-bottom: 20px; /* Adding some space at the bottom */
}

.profile-section:last-child {
    border-bottom: none; /* Remove border for the last section */
}

.profile-section h3 {
    margin-bottom: 15px;
    color: #007bff;
    font-size: 27px; /* Larger font size for section headings */
}

.profile-section p {
    margin-bottom: 10px;
    font-size: 18px; /* Increasing font size for better readability */
}

.profile-section p:last-child {
    margin-bottom: 0;
}

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
<?php include("inc/navbart.php"); ?>
		<!-- End header -->

    <div class="container1">
        <h2><strong>Teacher Profile</strong></h2>
        <?php if ($profile_details): ?>
        <div class="profile-section">
        <img src="pics/<?php echo $profile_details['timg']; ?>" alt="Profile Picture" style="width: 130px; height: 150px; border-radius: 20%; float: right; margin-left: 10px;">

            <h3>Personal Information</h3>
            <p><strong>Name:</strong><?php echo $profile_details['name']; ?></p>
            <p><strong>Gender:</strong><?php echo $profile_details['gender']; ?></p>
        </div>
        <div class="profile-section">
            <h3>Qualification</h3>
            <p><?php echo $profile_details['qualification']; ?></p>
        </div>
        <div class="profile-section">
            <h3>Subjects</h3>
            <p><?php echo $profile_details['subjects']; ?></p>
        </div>
        <div class="profile-section">
            <h3>Experience In Years</h3>
            <p><?php echo $profile_details['experience']; ?></p>
        </div>
        <div class="profile-section">
            <h3>Location</h3>
            <p><?php echo $profile_details['location']; ?></p>
        </div>
        
        <div class="profile-section">
            <h3>Teaching Preferences</h3>
            <p><?php echo $profile_details['preferences']; ?></p>
        </div>
        <div class="profile-section">
            <h3>Salary Range</h3>
            <p><?php echo $profile_details['salary']; ?></p>
        </div>
        <div class="profile-section">
            <p>
                <a href="edit.php?eid=<?php echo $profile_details['teid'];?>" class="btn btn-success">Edit</a>
                <span style="margin-left: 10px;"></span> <!-- Add some space -->
                <a onclick="return confirm('Are you sure to delete?')" href="delete.php?did=<?php echo $profile_details['teid'];?>" class="btn btn-danger">Delete</a>
            </p>
        </div>
        
        <?php else: ?>
            <p>Profile not found.</p>
        <?php endif; ?>

        <!-- Add more sections as needed -->
    </div>
	   <!-- start footer -->
       <?php include("inc/footer.html"); ?>
    <!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2024<a href="index.php">SmartEDU</a></p>
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

