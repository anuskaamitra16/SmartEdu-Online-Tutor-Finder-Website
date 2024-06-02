
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
				<li class="nav-item"><a class="nav-link" href="showpost.php">Posts</a></li>

					<li class="nav-item"><a class="nav-link" href="contactst.php">Contact</a></li>
                    <?php if(isset($_SESSION['tea']) && $_SESSION['tea']!="") { } else{ ?>
						<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">For Students</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-a">
							<a class="dropdown-item" href="loginst.php">Student Login</a>
							<a class="dropdown-item" href="homepage_findtutor.php">Find Tutors</a>
							
							<a class="dropdown-item" href="course-grid-2.html">Help For Students</a>
							<a class="dropdown-item" href="course-grid-2.html">Help for Parents</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">For Teachers</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-a">
							<a class="dropdown-item" href="logint.php">Tutor Login</a>
							<a class="dropdown-item" href="homejob.php">Jobs For Tutors</a>
							<a class="dropdown-item" href="course-grid-5.html">Help For Tutors</a>

						</div>
					</li>
					<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                
                    <ul class="nav navbar-nav navbar-right">
					<li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Register Now</span></a></li>
				
                </ul>
                <?php } ?>
				</ul>
				
			</div>
		</div>
	</nav>
</header>
