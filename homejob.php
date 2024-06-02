<?php
// Include your database connection file
include("data/db.php");

// Check if a search query is submitted
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    // Modify your SQL query to filter job posts by subject
    $query = "SELECT * FROM studentpost WHERE subjects LIKE '%$search%' OR location LIKE '%$search%' ORDER BY studentpost.name ASC";
    // Execute the query
    $result = $con->query($query);

    // Check if the query executed successfully
    if (!$result) {
        die("Error executing the query: " . $con->error);
    }

} else {
    // Default query without filtering
    $query = "SELECT * FROM studentpost ORDER BY studentpost.name ASC";
}
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
    <style>
    /* Job Posts Section */
    #job-for-tutors {
    perspective: 1000px;
}

.section-title {
    text-align: center;
    margin-bottom: 30px;
    font-size: 28px;
    color: #333;
}

.job-posts {
    display: flex; /* Use flexbox to arrange job posts side by side */
    flex-wrap: wrap; /* Allow job posts to wrap to the next line if necessary */
    justify-content: center; /* Center job posts horizontally */
    max-width: 1000px; /* Set a maximum width for the job posts container */
    margin: 0 auto; /* Center the job posts container */
}

.job-post {
    flex: 0 0 calc(50% - 40px); /* Set the width of each job post (half the container width minus margins) */
    margin: 0 20px 40px; /* Add margin between job posts */
    background-color: #f8f2ed;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 1px 1px 12px rgba(1, 1, 1, 0.1);
    transform-style: preserve-3d; /* Preserve 3D transformations */
    transition: transform 0.5s, box-shadow 0.3s; /* Add transition for smooth effect */
}

.job-post:hover {
    transform: rotateX(5deg); /* Apply rotation on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
}

.job-post h3 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #333;
}

.job-post p {
    margin: 5px 0; /* Adjust margin */
    color: #666;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 36px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 15px;
}

body {
    background-color: #f6e2ca; /* Light green */
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
/* Container for centering the search box */
.search-container {
    display: flex;
    justify-content: right;
    align-items: center;
    margin-top:20px;
    margin-right:15px;
}

/* Search input styling */
.search-input {
    padding: 12px 15px;
    font-size: 16px;
    width: 20%;
    border: 1px solid #ddd;
    border-radius: 50px 0 0 50px;
    outline: none;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.search-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
}

/* Search button styling */
.search-button {
    padding: 12px 25px;
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: #fff;
    border: none;
    border-radius: 0 50px 50px 0;
    cursor: pointer;
    outline: none;
    transition: background 0.3s ease, transform 0.3s ease;
    display: flex;
    align-items: center;
}

.search-button:hover {
    background: linear-gradient(45deg, #0056b3, #007bff);
    transform: scale(1.05);
}

.search-button:active {
    transform: scale(0.95);
}

/* Icon inside the search button */
.search-button .fa {
    margin-left: 10px;
    font-size: 18px;
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
<?php include("inc/home_tutor_nav.html"); ?>
		<!-- End header -->
        <form action="homejob.php" method="GET" class="search-form search-container">
    <input type="text" name="search" placeholder="Search by subject or location..." class="search-input">
    <button type="submit" class="search-button">
        <i class="fa fa-search"></i>
    </button>
</form>

<!-- "Job for Tutors" Section -->
<section id="job-for-tutors">
    <h1>Job Posts for Tutors</h1>
    <div class="job-posts">
        <?php
        // Check if there are posts to display
        if ($result->num_rows > 0) {
            // Loop through each post and display it
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="job-post">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><strong>Class:</strong> <?php echo $row['class']; ?></p>
                    <p><strong>Subjects:</strong> <?php echo $row['subjects']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
                    <p><strong>Budget:</strong> <?php echo $row['budget']; ?></p>
                    <p><strong>Additional Information:</strong> <?php echo $row['info']; ?></p>
                    <button type="submit" name="apply" class="applyButton">Apply</button>
                </div>
                <?php
            }
        } else {
            // If no posts found
            echo "<p>No job posts available.</p>";
        }
        ?>
    </div>
</section>
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
    <script>
    var applyButtons = document.querySelectorAll(".applyButton");

// Loop through each button and attach a click event listener
applyButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        alert("You have to log in to apply for the job posts");
    });
});
</script>

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
