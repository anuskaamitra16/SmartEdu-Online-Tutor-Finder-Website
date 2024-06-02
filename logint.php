<?php
session_start();
include("data/db.php");

// Check if the user submitted the login form
if (isset($_POST['login'])) {
    // Process login credentials
    $e = $_POST['email'];
    $p = MD5($_POST['pass']);

    $sel = "SELECT * FROM teachers WHERE email='$e' AND password='$p'";
    $rs = $con->query($sel);

    // Assuming login validation is successful and user is authorized
    if ($rs->num_rows > 0) {
        // Fetch user data
        $row = $rs->fetch_assoc();

        // Set session variables
        $_SESSION['tea'] = $row['tid']; // Assuming 'tid' is the teacher ID

        // Check if a profile exists for the user
        $user_id = $_SESSION['tea'];
        $query = "SELECT COUNT(*) AS profile_count FROM teachprofile WHERE teid = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the result
        $row = $result->fetch_assoc();
        $profile_count = $row['profile_count'];

        // Close the statement
        $stmt->close();

        // If a profile exists, redirect to the profile page
        if ($profile_count > 0) {
            header("Location: homeprofile.php");
            exit();
        } else {
            // If a profile doesn't exist, redirect to create profile page
            header("Location:teachercreate.php");
            exit();
        }
    } else {
        // Invalid credentials
        $error_message = "Invalid email or password. Please try again.";
    }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ecd4ff; /* Light beige background color */
        }

    .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #f4f7fc; /* Light blue background color */
            box-shadow: 1px 8px 8px rgba(1, 1, 1, 0.7);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            outline: none;
            box-shadow: none;
            background-color: transparent; /* Transparent background for input fields */
        }

        .login-container input[type="email"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #007bff;
        }

        .login-container button[type="submit"] {
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .login-container button[type="submit"]:hover {
            background-color: #0056b3;
        }    </style>

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
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
				</ul>
				
			</div>
		</div>
	</nav>
</header>

<div class="login-container">
        <h2 class="text-center mb-4">Teacher Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="teacherEmail">Email address</label>
                <input name="email" type="email" class="form-control" id="teacherEmail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="teacherPassword">Password</label>
                <input name="pass" type="password" class="form-control" id="teacherPassword" placeholder="Password">
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            <?php if(isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
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
