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
            background-color:#e3ccfc;
        }
    h1{
        text-align:center;
        font-size: 2.5em;
    margin-bottom: 30px;
    margin-top:20px;
    }
    .content{
        max-width: 900px;
    margin-bottom: 50px;
    margin-left:17%;
    padding: 20px;
    background-color: #ffeefa;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
<?php include("inc/helptutornav.html"); ?>
		<!-- End header -->
        <h1>Help for Tutors</h1>
        <div class="content">
        
    <ol>
        <li><strong>Registration:</strong>
            <ul>
                <li>Teachers start by registering on the website by providing necessary details such as name, email, and password.</li>
                <li>Registration ensures a personalized experience and allows access to all features.</li>
            </ul>
        </li>
        <li><strong>Login:</strong>
            <ul>
                <li>After registration, teachers log in using their email and password credentials.</li>
                <li>Login grants access to their personalized dashboard and profile management tools.</li>
            </ul>
        </li>
        <li><strong>Profile Creation:</strong>
            <ul>
                <li>Once logged in, teachers create their profile which will be visible to potential students.</li>
                <li>A comprehensive profile helps students understand the teacher's expertise, teaching style, and availability.</li>
                <li>The profile creation form prompts teachers to input details such as education background, subjects they teach, teaching experience, preferred teaching methods, and availability schedule.</li>
            </ul>
        </li>
        <li><strong>Profile Dashboard:</strong>
            <ul>
                <li>Upon successful profile creation, teachers are redirected to their profile dashboard.</li>
                <li>The dashboard serves as a central hub for managing their profile, viewing student requests, and tracking application statuses.</li>
            </ul>
        </li>
        <li><strong>Applying to Student Posts:</strong>
            <ul>
                <li>Teachers can browse available student posts seeking tutoring assistance.</li>
                <li>They can apply to relevant posts based on their expertise and availability.</li>
                <li>The application process may involve submitting a personalized message outlining qualifications and teaching approach.</li>
            </ul>
        </li>
        <li><strong>Notification System:</strong>
            <ul>
                <li>Teachers receive notifications for both student requests and acceptance.</li>
                <li>Notifications ensure timely communication and help teachers stay updated on new tutoring opportunities.</li>
                <li>Instant alerts streamline the process of connecting teachers with potential students.</li>
            </ul>
        </li>
        <li><strong>Matching Algorithm:</strong>
            <ul>
                <li>The website employs a sophisticated matching algorithm to pair teachers with suitable students based on their preferences and qualifications.</li>
                <li>This algorithm ensures efficient and targeted matching, optimizing the tutoring experience for both teachers and students.</li>
            </ul>
        </li>
        <li><strong>Your Ratings and Reviews by Students:</strong>
    <ul>
        <li>Gain insights from student feedback to improve your teaching.</li>
        <li>Enhance your reputation with positive reviews and attract more students.</li>
    </ul></li>
        <li><strong>Personalized Tutoring Experience:</strong>
            <ul>
                <li>Overall, the website aims to provide teachers with a seamless platform to find appropriate students to tutor.</li>
                <li>Through personalized profiles, intuitive dashboards, and efficient communication channels, teachers can focus on what they do best: teaching.</li>
            </ul>
        </li>
    </ol>
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
