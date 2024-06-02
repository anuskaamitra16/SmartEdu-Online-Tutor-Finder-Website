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
            background: linear-gradient(45deg, #ff8a00, #e52e71, #ff0099, #5c24fe, #007bff, #008000, #e52e71, #ff8a00);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: Arial, sans-serif;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .container1 {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .container1 h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-control {
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 12px 20px;
            background-color: #fff;
            color: #333;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 12px 30px;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-check-label {
            margin-right: 20px;
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
<?php include("inc/navbart2.php"); ?>
		<!-- End header -->
        <div class="container1">
        <h2>Create Your Profile</h2>
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" name="name" id="fullName" placeholder="Enter your full name">
            </div>
            <div class="form-group">
        <label for="profileImage">Profile Image</label>
        <input type="file" class="form-control-file" name="img" id="profileImage">
    </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
    </div>
            <div class="form-group">
                <label for="qualification">Qualification</label>
                <input type="text" name="qual" class="form-control" id="qualification" placeholder="Enter your qualification">
            </div>
            <div class="form-group">
                <label>Subjects you can teach</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sub[]" value="Maths" id="subjectMaths">
                    <label class="form-check-label" for="subjectMaths">
                        Maths
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sub[]" value="English" id="subjectEnglish">
                    <label class="form-check-label" for="subjectEnglish">
                        English
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sub[]" value="SST" id="subjectSST">
                    <label class="form-check-label" for="subjectSST">
                        SST
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sub[]" value="Science" id="subjectScience">
                    <label class="form-check-label" for="subjectScience">
                        Science
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sub[]" value="Computer" id="subjectComputer">
                    <label class="form-check-label" for="subjectComputer">
                        Computer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sub[]" value="Bengali" id="subjectBengali">
                    <label class="form-check-label" for="subjectBengali">
                        Bengali
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sub[]" value="Hindi" id="subjectHindi">
                    <label class="form-check-label" for="subjectHindi">
                        Hindi
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="experience">Experience (in years)</label>
                <input type="number" name="exp" class="form-control" id="experience" placeholder="Enter your experience">
            </div>
            <div class="form-group">
                <label for="experience">Location</label>
                <input type="text" name="loc" class="form-control" id="location" placeholder="Enter your location">
            </div>
            
            <div class="form-group">
                <label>Preferences to Teach</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="teach[]" value="Online" id="teachOnline">
                    <label class="form-check-label" for="teachOnline">
                        Online
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="teach[]" value="Student's Place" id="teachStudentsPlace">
                    <label class="form-check-label" for="teachStudentsPlace">
                        Student's Place
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="teach[]" value="Teacher's Place" id="teachTeachersPlace">
                    <label class="form-check-label" for="teachTeachersPlace">
                        Teacher's Place
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="salaryRange">Salary Range</label>
                <input type="text" name="sal" class="form-control" id="salaryRange" placeholder="Enter your salary range">
            </div>

            
            <button type="submit" name="save" class="btn btn-primary btn-block">Submit</button>
        </form>
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
