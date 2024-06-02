<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>SmartEDU - Online Tutor Finder</title>  
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
    /* CSS styles for the input fields */
.contact_form input[type="text"],
.contact_form input[type="email"]
 {
    color: #000; /* Set the font color to black */
    font-weight: bold; /* Optionally, increase the font weight for emphasis */
    /* Add any other desired styling properties */
}

/* CSS styles for the submit button */
.contact_form button[type="submit"] {
    color: #fff; /* Set the font color of the button text */
    background-color: #000; /* Set the background color of the button */
    /* Add any other desired styling properties */
}
.contact_form textarea {
    color: #000 !important; /* Set the font color to black */
    font-weight: bold; /* Optionally, increase the font weight for emphasis */
    /* Add any other desired styling properties */
}

</style>

</head>
<body class="host_version"> 
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
									<input class="form-control" name="mob" id="mobile" placeholder="Mobile" type="number">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="pass" id="password" placeholder="Password" type="password">
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
									<input class="form-control" name="mob" id="mobile" placeholder="Mobile" type="number">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="pass" id="password" placeholder="Password" type="password">
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
	
<?php include("inc/contactnavst.php");
?>
	
	<!-- End header -->
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Contact<span class="m_1"></span></h1>
		</div>
	</div>
	
    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Facing some issues ? No worries !</h3>
                <p class="lead">Send us ur feedback and tell us your problem</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" class="" action="contactins.php" name="contactform" method="post">
                            <div class="row row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="type" id="type" class="form-control" placeholder="Teacher/ Student" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="form-control" name="problem" id="problem" rows="6" placeholder="Tell us your problem in details" required></textarea>
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" value="SEND" name="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
				<div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <iframe class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14745.724895115729!2d88.3374807!3d22.4879985!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f9dd2c9b4f9cdff!2sSITM%3A%20Best%20BBA%20College%20in%20Kolkata%20(MAKAUT%20Approved)!5e0!3m2!1sen!2sin!4v1672307635537!5m2!1sen!2sin"
                                frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                            </div>
                        </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	
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
	<!-- Mapsed JavaScript -->
	<script src="js/mapsed.js"></script>
	<script src="js/01-custom-places-example.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

</body>
</html>