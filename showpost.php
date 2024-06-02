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
            font-family: Arial, sans-serif;
            background-color: #ffddff;
            margin: 0;
            padding: 0;
        }

        .container1 {
    max-width: 800px;
    margin-left: 30px;
    padding: 20px;
    border-radius: 20px;
    background-color: #fff;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: inline-block; /* Add this */
    margin-right:50px; /* Add margin between posts */
    vertical-align: top; /* Align posts to the top */   
    margin-bottom: 70px;
    
        }

        .container1:before {
            content: "";
            position: absolute;
            top: -15px;
            left: -15px;
            right: -15px;
            bottom: -15px;
            border-radius: 35px;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.05));
            z-index: -1;
            background-color: #f5f5f5;
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

        .post {
            padding: 15px;
            border-radius: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .post h2 {
            font-size: 20px;
            margin-bottom: 8px;
            color: #333;
        }

        .post p {
            font-size: 14px;
            line-height: 1.5;
            color: #555;
            margin-bottom: 5px;
        }

        .post p strong {
            font-weight: bold;
            color: #333;
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
<?php include("inc/postnav.php"); ?>
		<!-- End header -->

        <?php
include("data/db.php"); // Include your database connection file

// Check if the student is logged in
if(isset($_SESSION['stu'])) {
    $student_id = $_SESSION['stu']; // Get the student ID from the session

    // Query to fetch posts for the logged-in student
    $query = "SELECT * FROM studentpost WHERE student_id = $student_id";
    $result = $con->query($query);

    // Display the posts
    if ($result->num_rows > 0) {
        ?>
        <h1>Posts</h1>
        <?php
        while ($row = $result->fetch_assoc()) {
            
        ?>
            <div class="container1">
                <div class="post">
                    <h2><?php echo $row['name']; ?></h2>
                    <p><strong>Class:</strong> <?php echo $row['class']; ?></p>
                    <p><strong>Subjects:</strong> <?php echo $row['subjects']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
                    <p><strong>Budget:</strong> <?php echo $row['budget']; ?></p>
                    <p><strong>Additional Information:</strong> <?php echo $row['info']; ?></p>
                    <p>
                        <a href="editstpost.php?eid=<?php echo $row['pid'];?>" class="btn btn-success">Edit</a>
                        <span style="margin-left: 10px;"></span> <!-- Add some space -->
                        <a onclick="return confirm('Are you sure to delete?')" href="deletepost.php?did=<?php echo $row['pid'];?>" class="btn btn-danger">Delete</a>
                    </p>
                </div>
            </div>
        <?php
        }
    } else {
        echo "<p>No posts found for this student.</p>";
    }
} else {
    // Redirect to the login page if the student is not logged in
    header("Location: login.php");
    exit(); // Stop further execution
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
