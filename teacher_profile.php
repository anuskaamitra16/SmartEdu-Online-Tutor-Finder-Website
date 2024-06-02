<?php
// Include your database connection file
include("data/db.php");

// Check if the teacher_id parameter is set in the URL
if(isset($_GET['teacher_id'])) {
    // Get the teacher_id from the URL
    $teacher_id = $_GET['teacher_id'];
    // Retrieve the teacher's information from the database
    $query = "SELECT * FROM teachprofile WHERE teid = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $teacher_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the teacher exists
    if($result->num_rows > 0) {
        // Fetch the teacher's information
        $row = $result->fetch_assoc();
        $teacher_id = $row['teid'];
        $ratings_query = "SELECT AVG(rating) AS avg_rating, COUNT(*) AS num_reviews FROM reviews WHERE teacher_id = $teacher_id";
        $ratings_result = $con->query($ratings_query);
        $ratings_row = $ratings_result->fetch_assoc();
        $avg_rating = $ratings_row['avg_rating'];
        $num_reviews = $ratings_row['num_reviews'];
        
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
    <!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    

    <style>
                .container1 {
            max-width: 800px;
            margin: 50px auto;
        }
        /* Style for the cards */
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .card::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 0;
            width: 100%;
            height: 100%;
            /* Remove background property */
            border-radius: 10px;
            z-index: -1;
            transition: transform 0.5s ease;
            transform: translateY(50%) rotateX(20deg);
            opacity: 0.8;
        }
        .card:hover::before {
            transform: translateY(-50%) rotateX(20deg);
        }
        .card-title {
            color: black;
            font-weight: bold;
        }
        .card-text {
            color: #333;
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
                body {
                    background-color: #e6f2ff; /* Light pastel blue */
                }

                /* CSS for the modal */
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
<?php include("inc/tutornav.php"); ?>
		<!-- End header -->
        <h1>Tutor Profile</h1>
            <div class="container1">
            <div class="card mb-3">
                    <div class="card-body">
                    <h2 class="card-title">
                    <?php echo $row['name']; ?>
                    </h2>
                    <img src="pics/<?php echo $row['timg']; ?>" alt="Profile Picture" style="width:150px; border-radius: 50%; float: right; margin-left: 10px; margin-top: -10px;">
                    <p class="card-text"><strong>Ratings:</strong> 
    <a href="ratings_reviews.php?teacher_id=<?php echo $teacher_id; ?>">
        <?php echo number_format($avg_rating, 1); ?> ⭐
    </a> 
    (<?php echo $num_reviews; ?> reviews)
</p>

                    <p class="card-text"><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                    <p class="card-text"><strong>Qualification:</strong> <?php echo $row['qualification']; ?></p>
                    <p class="card-text"><strong>Subjects:</strong> <?php echo $row['subjects']; ?></p>
                    <p class="card-text"><strong>Experience:</strong> <?php echo $row['experience']; ?> years</p>
                    <p class="card-text"><strong>Location:</strong> <?php echo $row['location']; ?></p>
                    <p class="card-text"><strong>Preferences:</strong> <?php echo $row['preferences']; ?></p>
                    <p class="card-text"><strong>Salary Range:</strong> <?php echo $row['salary']; ?></p>
                   
            </div>
                        </div>
</div>

        	   <!-- start footer -->
               <?php include("inc/findtutorfooter.html"); ?>
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
    <script>
    // Check if the success query parameter is present in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    // If success parameter is present and has a value of 1, show the popup
    if (success === '1') {
        alert('Request sent successfully!');
    }
</script>

</body>
</html>
<?php
    } else {
        // If no teacher found with the given ID
        echo "<p>No tutor found.</p>";
    }
} else {
    // If teacher_id parameter is not set in the URL
    echo "<p>Teacher ID not provided.</p>";
}
?>