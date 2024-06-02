<?php
session_start(); // Start the session
include("data/db.php"); // Include your database connection file

// Check if a search query is submitted
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    // Modify your SQL query to filter tutor profiles by subject or location
    $query = "SELECT teachprofile.*, teachers.tid 
              FROM teachprofile 
              JOIN teachers ON teachprofile.teid = teachers.tid
              WHERE subjects LIKE '%$search%' OR location LIKE '%$search%' ORDER BY teachers.name ASC";
    // Execute the query
    $result = $con->query($query);

    // Check if the query executed successfully
    if (!$result) {
        die("Error executing the query: " . $con->error);
    }

    // Continue with displaying the results
} else {
    // If no search term is provided, display all tutor profiles
    // Default query without filtering
    $query = "SELECT teachprofile.*, teachers.tid 
              FROM teachprofile 
              JOIN teachers ON teachprofile.teid = teachers.tid ORDER BY teachers.name ASC";

    // Execute the default query
    $result = $con->query($query);

    // Check if the query executed successfully
    if (!$result) {
        die("Error executing the query: " . $con->error);
    }

    // Continue with displaying the results
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
    <!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
    <style>
        .container1 {
            max-width: 700px;
            margin: 50px auto;
        }
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
            background-color: #e6c4b7; /* Light pastel blue */
        }
        button[name="apply"] {
            background-color: green;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: not-allowed;
            border-radius: 5px;
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
<?php include("inc/tutornav.php"); ?>
<!-- End header -->
<!-- Search Form -->
<form action="findtutor.php" method="GET" class="search-form search-container">
    <input type="text" name="search" placeholder="Search by subject or location..." class="search-input">
    <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
</form>
<h1>Tutor Profiles</h1>
<div class="container1">
    <?php
    // Check if there are profiles to display
    if ($result->num_rows > 0) {
        // Loop through each profile and display it
        while ($row = $result->fetch_assoc()) {
        $teacher_id = $row['tid'];
        $ratings_query = "SELECT AVG(rating) AS avg_rating, COUNT(*) AS num_reviews FROM reviews WHERE teacher_id = $teacher_id";
        $ratings_result = $con->query($ratings_query);
        $ratings_row = $ratings_result->fetch_assoc();
        $avg_rating = $ratings_row['avg_rating'];
        $num_reviews = $ratings_row['num_reviews'];
        
            ?>
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
                    <!-- Check request status and display button accordingly -->
                    <?php 
                    // Check if the student has already requested this teacher
                    if(isset($_SESSION['stu'])) {
                        $student_id = $_SESSION['stu'];
                        $request_query = "SELECT * FROM teachrequests WHERE teacher_id = {$row['teid']} AND student_id = $student_id";
                        $request_result = $con->query($request_query);
                        if ($request_result && $request_result->num_rows > 0): ?>
                            <button name="apply" disabled>Requested</button>
                        <?php else: ?>
                            <a href="noti.php?tid=<?php echo $row['tid']; ?>" class="btn btn-primary">Request</a>
                        <?php endif;
                    } else {
                        echo "<p>Please log in to request a tutor.</p>";
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    } else {
        // If no profiles found
        echo "<p>No tutors found.</p>";
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
