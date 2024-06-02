<?php
// Include your database connection file
include("data/db.php");
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
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
        body {
            font-family: Arial, sans-serif;
            background-color: #c8e6c9;
        }

        .teacher-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .teacher {
            width: 200px;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
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

/* Subheading styling */
h4 {
    text-align: center;
    color: #007bff;
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
    position: relative;
}

h4::after {
    content: '';
    display: block;
    width: 50px;
    height: 3px;
    background-color: #007bff;
    margin: 10px auto 0;
    border-radius: 2px;
}
        .teacher:hover {
            transform: translateY(-5px);
        }

        .teacher img {
            width: 100%;
            border-radius: 8px;
        }

        .teacher-info {
            padding: 10px;
        }

        .teacher-info h2 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .teacher-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
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
<?php include("inc/review.html"); ?>
<!-- End header -->

<?php 
// Assuming the logged-in student's ID is stored in a session variable
$student_id = $_SESSION['stu'];

// Retrieve teacher-student pairs who have accepted each other
$query = "SELECT teachprofile.*, notifications.notification_id
FROM notifications
INNER JOIN teachprofile ON teachprofile.teid = notifications.receiver_id
WHERE notifications.sender_id = '$student_id' AND notifications.status = 'read';
";

$result = $con->query($query);

?>

<div class="container1">
    <h1>Rate & Review Your Teachers</h1>
    <h4>Teachers Who Accepted Your Request</h4>
    <div class="teacher-list">
        <?php
        // Check if there are accepted teacher-student pairs
        if ($result->num_rows > 0) {
            // Loop through each pair and display the details
            while ($row = $result->fetch_assoc()) {
                ?>
                <a href="review_form.php?teacher_id=<?php echo $row['teid']; ?>" class="teacher-link">
                <div class="teacher">
                    <img src="pics/<?php echo $row['timg']; ?>" alt="Teacher Image">
                    <div class="teacher-info">
                        <h2>Rate <?php echo $row['name']; ?></h2>
                    </div>
                </div>
                </a>
                <?php
            }
        } else {
            echo "<p>No accepted teachers found.</p>";
        }
        ?>
    </div>
</div>




<?php 
// Assuming the logged-in student's ID is stored in a session variable
$student_id = $_SESSION['stu'];

// Retrieve teacher-student pairs who have accepted each other
$query = "SELECT teachprofile.*, teachernotifications.notification_id
FROM teachernotifications
INNER JOIN teachprofile ON teachprofile.teid = teachernotifications.teacher_id
WHERE teachernotifications.student_id = '$student_id' AND teachernotifications.status = 'read';
";

$result = $con->query($query);

?>

<div class="container1">
    <h4>Teachers You Have Accepted</h4>
    <div class="teacher-list">
        <?php
        // Check if there are accepted teacher-student pairs
        if ($result->num_rows > 0) {
            // Loop through each pair and display the details
            while ($row = $result->fetch_assoc()) {
                ?>
                <a href="review_form.php?teacher_id=<?php echo $row['teid']; ?>" class="teacher-link">
                <div class="teacher">
                    <img src="pics/<?php echo $row['timg']; ?>" alt="Teacher Image">
                    <div class="teacher-info">
                        <h2>Rate <?php echo $row['name']; ?></h2>
                    </div>
                </div>
                </a>
                <?php
            }
        } else {
            echo "<p>No accepted teachers found.</p>";
        }
        ?>
    </div>
</div>

<!-- Start footer -->
<?php include("inc/footer.html"); ?>
<!-- End footer -->

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
