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
            background-color:#fae8ed;
        }
    h1{
        text-align:center;
        font-size: 2.5em;
    margin-bottom: 30px;
    margin-top:20px;
    }
    .content{
        max-width: 800px;
    margin-bottom: 50px;
    margin-left:20%;
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
        <h1>Help for Students/Parents</h1>
        <div class="content">
        <ol>
        <li><strong>Registration:</strong>
            <ul>
                <li>Students/parents start by registering on the website by providing necessary details.</li>
                <li>They fill out a form with required information such as name, email, and password.</li>
            </ul>
        </li>
        <li><strong>Login:</strong>
            <ul>
                <li>After registration, students/parents log in using their email and password credentials.</li>
            </ul>
        </li>
        <li><strong>Create Post:</strong>
            <ul>
                <li>Once logged in, students/parents can create a post to find appropriate teachers.</li>
                <li>They fill out a form with details such as subject, preferred teaching style, and availability.</li>
            </ul>
        </li>
        <li><strong>Post Dashboard:</strong>
            <ul>
                <li>After creating a post, students/parents are redirected to the post dashboard.</li>
                <li>Here, they can view their existing posts and manage them.</li>
            </ul>
        </li>
        <li><strong>Request Teachers:</strong>
            <ul>
                <li>In the post dashboard, students/parents can browse teachers' profiles and request their assistance.</li>
            </ul>
        </li>
        <li><strong>Add New Post:</strong>
            <ul>
                <li>Students/parents can add new posts anytime they need to find tutors for different subjects or topics.</li>
            </ul>
        </li>
        <li><strong>Notifications:</strong>
            <ul>
                <li>Students/parents receive notifications for teacher acceptance and teacher requests.</li>
                <li>Notifications ensure they stay updated on new tutoring opportunities and teacher responses.</li>
            </ul>
        </li>
        <li><strong>Rate and Review the teachers</strong>
    <ul>
        <li><strong>Rate Your Teachers:</strong> Provide valuable feedback by rating your teachers based on your learning experience. Your ratings help other students make informed decisions and also help teachers improve their teaching methods.

</li>
<li><strong>Write Detailed Reviews:</strong> Share your thoughts and experiences in detail by writing comprehensive reviews. Highlight specific strengths or areas for improvement, and describe how the teacher's approach has impacted your learning journey.

</li>
    </ul>
    </li>
        <li><strong>Matching Needs:</strong>
            <ul>
                <li>The website provides a matching system to help students/parents find tutors that meet their specific needs.</li>
                <li>By inputting their requirements and preferences, they can easily find suitable tutors.</li>
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
