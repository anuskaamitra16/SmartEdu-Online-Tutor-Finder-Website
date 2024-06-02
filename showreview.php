<?php
// Include your database connection file
include("data/db.php");

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Assuming student_id is stored in the session
$student_id = $_SESSION['stu'];

// Retrieve reviews for the current student from the database
$query = "SELECT r.*, t.name 
          FROM reviews r 
          JOIN teachers t ON r.teacher_id = t.tid 
          WHERE r.student_id = '$student_id'";
$result = $con->query($query);
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
    <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
                .review-container {
    width: 45%;
    display: inline-block;
    margin: 10px;
    
}

.review {
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 15px;
    margin-left:30px;
    margin-bottom:40px;
    width:70%;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 1.1);
}
body{
    background-color:#e1d5e7;
}
/* Style for filled star */
.fas.fa-star {
    color: gold; /* Change color as needed */
}

/* Style for empty star */
.far.fa-star {
    color: lightgray; /* Change color as needed */
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
<?php include("inc/showreview.html"); ?>
		<!-- End header -->
    
    <h1>Your Reviews</h1>
    <div class="reviews">
        <?php
        // Check if reviews are found
        if ($result->num_rows > 0) {
            // Loop through each review and display the details
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="review-container">
                <div class="review">
                <h2>Teacher Name: <?php echo $row['name']; ?></h2>
                   <p><strong>Rating:</strong><?php
// Assuming $row['rating'] contains the rating value
$rating = $row['rating'];
// Loop to display stars based on the rating value
for ($i = 1; $i <= 5; $i++) {
    if ($i <= $rating) {
        // Display a filled star if $i is less than or equal to the rating
        echo '<i class="fas fa-star"></i>';
    } else {
        // Display an empty star if $i is greater than the rating
        echo '<i class="far fa-star"></i>';
    }
}
?></p>
                   
                    <p><strong>Question 1:</strong>  <?php echo $row['q1']; ?></p>
                    <p><strong>Question 2:</strong>  <?php echo $row['q2']; ?></p>
                    <p><strong>Question 3:</strong>  <?php echo $row['q3']; ?></p>
                    <p><strong>Question 4:</strong>  <?php echo $row['q4']; ?></p>
                    <p><strong>Additional Comments:</strong>  <?php echo $row['review_text']; ?></p>
                </div>
            </div>
                <?php
            }
        } else {
            echo "<p>No reviews found.</p>";
        }
        ?>
    </div>

 <!-- start footer -->
 <?php include("inc/findtutorfooter.html"); ?>
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
