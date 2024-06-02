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
    <style>.radio-label {
    display: inline-block; /* Display each label inline */
    margin-right: 20px; /* Add some space between the radio button and label */
    cursor: pointer;
}

.radio-custom {
    position: relative;
    display: inline-block; /* Display the radio button inline */
    vertical-align: middle; /* Align vertically with the label text */
    margin-right: 5px; /* Add some space between the radio button and label */
}

        .modal-content .form-control {
            color: black!important;
        }

</style>
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Define the showRegistrationModal function -->

<script>
function closeTermsModal(type) {
    if (type === 'tutor') {
        $('#termsModalTutor').modal('hide');
    } else if (type === 'studentParent') {
        $('#termsModalStudentParent').modal('hide');
    }
}

$(document).ready(function() {
    $('#termsModalTutor, #termsModalStudentParent').on('hidden.bs.modal', function () {
        $('#login').modal('show');
    });
});
</script>
</head>
<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="registerModalLabel">Register</h4>
            </div>
            <div class="modal-body customer-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="active" href="#tutorRegistration" data-toggle="tab">As Tutor</a></li>
                    <li><a href="#studentParentRegistration" data-toggle="tab">As Student/Parent</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tutorRegistration">
                        <form action="regis.php" method="post" role="form" class="form-horizontal">
                            <!-- Tutor Registration Fields -->
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="name" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="email" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="mob" id="mobile" placeholder="Mobile" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="pass" id="password" placeholder="Password" type="password">
								</div>
							</div>     
                            <!-- Terms and Conditions Checkbox -->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="agree_terms" value="agreed" required>
                                        <span class="checkbox-custom"></span>
                                        I agree to the<a href="#termsModalTutor" data-toggle="modal" data-dismiss="modal">terms and conditions</a>

                                    </label>
                                </div>
                            </div>
    <!-- Submit Button -->
    <div class="row">
        <div class="col-sm-10">
            <button type="submit" name="savetu" class="btn btn-light btn-radius btn-brd grd1">Register as Tutor</button>
        </div>
    </div>
</form>
                    
                        
                    </div>
                    <div class="tab-pane" id="studentParentRegistration">
                        <form action="regis2.php" method="post" role="form" class="form-horizontal">
                            <!-- Student/Parent Registration Fields -->
                            <div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="name" placeholder="Name" type="text">
								</div>
							</div>
                            <div class="form-group">
    <div class="col-sm-12">
        <label class="radio-label">
            <input type="radio" name="type" value="student">
            <span class="radio-custom"></span>
            Student
        </label>
        <label class="radio-label">
            <input type="radio" name="type" value="parent">
            <span class="radio-custom"></span>
            Parent
        </label>
    </div>
</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="email" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="mob" id="mobile" placeholder="Mobile" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="pass" id="password" placeholder="Password" type="password">
								</div>
							</div>
                          <!-- Terms and Conditions Checkbox -->
                          <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="agree_terms" value="agreed" required>
                                        <span class="checkbox-custom"></span>
                                        I agree to the <a href="#termsModalStudentParent" data-toggle="modal" data-dismiss="modal">terms and conditions</a>

                                    </label>
                                </div>
                            </div>

    <!-- Submit Button -->
    <div class="row">
        <div class="col-sm-10">
            <button type="submit" name="savest" class="btn btn-light btn-radius btn-brd grd1">Register as Student/Parent</button>
        </div>
    </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>
<!-- Tutor Terms and Conditions Modal -->
<div class="modal fade" id="termsModalTutor" tabindex="-1" role="dialog" aria-labelledby="termsModalLabelTutor">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" aria-label="Close" onclick="closeTermsModal('tutor')">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="termsModalLabelTutor">Terms and Conditions for Tutors</h4>
            </div>
            <div class="modal-body">
                <h2>Terms and Conditions for Tutors</h2>
                <ol>
                    <li><strong>Eligibility:</strong> By registering as a tutor on SmartEDU , you confirm that you are at least 18 years of age and legally eligible to enter into a contract.</li>
                    <li><strong>Accuracy of Information:</strong> You agree to provide accurate and up-to-date information during the registration process. This includes your personal details, qualifications, and any other information required for your profile.</li>
                    <li><strong>Tutoring Services:</strong> As a tutor on our platform, you agree to provide tutoring services in a professional and ethical manner. This includes delivering high-quality instruction, adhering to scheduled sessions, and maintaining appropriate communication with students.</li>
                    <li><strong>Communication and Conduct:</strong> You agree to communicate respectfully and professionally with students and parents. Any form of inappropriate behavior or communication will result in termination of your account.</li>
                    <li><strong>Privacy Policy:</strong> By using our platform, you agree to abide by our Privacy Policy, which outlines how we collect, use, and protect your personal information.</li>
                    <li><strong>Changes to Terms and Conditions:</strong> SmartEDU reserves the right to modify these terms and conditions at any time. We will notify you of any changes, and your continued use of our platform constitutes acceptance of the revised terms.</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Student/Parent Terms and Conditions Modal -->
<div class="modal fade" id="termsModalStudentParent" tabindex="-1" role="dialog" aria-labelledby="termsModalLabelStudentParent">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" aria-label="Close" onclick="closeTermsModal('studentParent')">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="termsModalLabelStudentParent">Terms and Conditions for Students and Parents</h4>
            </div>
            <div class="modal-body">
                <h2>Terms and Conditions for Students and Parents</h2>
                <ol>
                    <li><strong>Eligibility:</strong> By registering as a student or parent on SmartEDU , you confirm that you are at least 18 years of age (or have parental consent if under 18) and legally eligible to enter into a contract.</li>
                    <li><strong>Accuracy of Information:</strong> You agree to provide accurate and up-to-date information during the registration process. This includes your personal details and any other information required for your profile.</li>
                    <li><strong>Booking Tutoring Sessions:</strong> You agree to book tutoring sessions through [Your Website Name] and to not bypass the platform to arrange private sessions with tutors. Failure to comply may result in termination of your account.</li>
                    <li><strong>Communication and Conduct:</strong> You agree to communicate respectfully and professionally with tutors. Any form of inappropriate behavior or communication will result in termination of your account.</li>
                    <li><strong>Privacy Policy:</strong> By using our platform, you agree to abide by our Privacy Policy, which outlines how we collect, use, and protect your personal information.</li>
                    <li><strong>Changes to Terms and Conditions:</strong> SmartEDU  reserves the right to modify these terms and conditions at any time. We will notify you of any changes, and your continued use of our platform constitutes acceptance of the revised terms.</li>
                </ol>
            </div>
        </div>
    </div>
</div>




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
    <?php include("inc/navbar.html"); ?>
		<!-- End header -->
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slider-01.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-right">
									<div class="big-tagline">
										<h2><strong>SmartEDU </strong> Online Tutor Finder</h2>
											<a href="homepage_findtutor.php" class="hover-btn-new"><span>Explore Tutor Profiles</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="homejob.php" class="hover-btn-new"><span>Jobs</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>

			
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>About Us</h3>
                    <p class="lead">Discover a world of learning opportunities with our online tutor finder platform. Whether you're a student seeking academic support or a tutor looking to share your expertise, we connect learners with skilled educators for personalized learning journeys.</p>
                </div>
            </div><!-- end title -->
        
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Welcome to SmartEDU - Onliner Tutor Finder Platform</h2>
                        <p>Struggling to find students tailored to your expertise? Look no further! Our website is your ultimate solution. </p> 
                        <p>Seamlessly connect with students that match your teaching style and preferences. Whether you're seeking students in your locality or beyond, we've got you covered. Join us today and let us help you find the perfect match!</p>
                        <a href="homejob.php" class="hover-btn-new orange"><span>Start Searching for Students</span></a>
                        
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/a1.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/a2.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Customized Tutor Matching</h2>
                        <p>"Are you looking for the perfect tutor to help you or your child excel academically?</p> <p> With our platform, students and parents can effortlessly post their specific learning requirements, from subjects and grade levels to preferred teaching styles.</p> <p> Sit back and relax as qualified teachers from your local area respond promptly, ready to tailor their expertise to your unique needs.</p>

                        <a href="homepage_findtutor.php" class="hover-btn-new orange"><span>Explore Tutor Profiles</span></a>
                        
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

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