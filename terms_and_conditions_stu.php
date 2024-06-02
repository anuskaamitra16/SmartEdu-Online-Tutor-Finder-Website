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
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        #terms_and_conditions {
            padding: 50px 0;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        li {
            font-size: 16px;
            margin-bottom: 10px;
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
	
<section id="terms_and_conditions">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><strong>Terms and Conditions for Students/Parents</strong></h2>
                    <p>Welcome to SmartEDU - Online Tutor Finder ! Before you proceed to register or use our services, please carefully read and understand the following terms and conditions. By registering or using our platform, you agree to abide by these terms and conditions.</p>

                    <ol>
        <li>
            <h3><strong>Eligibility:</strong></h3>
            <p>By registering as a user on SmartEDU, you confirm that you are at least 18 years of age and legally eligible to enter into a contract.</p>
        </li>
        <li>
            <h3><strong>Registration Information:</strong></h3>
            <p>You agree to provide accurate and up-to-date information during the registration process. This includes your personal details, contact information, and any other information required to create your profile on our platform.</p>
        </li>
        <li>
            <h3><strong>Use of Services:</strong></h3>
            <p>You agree to use the services provided by SmartEDU solely for their intended purpose. Any misuse or unauthorized use of the platform is strictly prohibited.</p>
        </li>
        <li>
            <h3><strong>Payment Terms:</strong></h3>
            <p>All payments for tutoring services must be made exclusively through SmartEDU's secure payment gateway. Any attempt to bypass our payment system by arranging off-platform transactions will result in immediate termination of the user's account.</p>
            <ol>
                <li>
                    <h4><strong>Online Payments:</strong></h4>
                    <p>We offer a convenient online payment system, allowing you to securely pay for tutoring sessions using various payment methods, including credit/debit cards, electronic wallets, and other supported options.</p>
                </li>
                <li>
                    <h4><strong>Safe and Secure Transactions:</strong></h4>
                    <p>Your financial information is safeguarded through robust encryption and security protocols to prevent unauthorized access or fraud.</p>
                </li>
                <li>
                    <h4><strong>Transparent Pricing:</strong></h4>
                    <p>The pricing for tutoring services is clearly displayed on our platform, with no hidden fees. You will only be charged for the services you use.</p>
                </li>
                <li>
                    <h4><strong>Prepayment Requirement:</strong></h4>
                    <p>To confirm and secure tutoring sessions, students/parents are required to prepay for the scheduled sessions through our platform.</p>
                </li>
            </ol>
        </li>
        <!-- Include other terms and conditions points as needed -->
    </ol>
    
                    <!-- Additional Information -->
                    <p>By registering or using our platform, you signify your acceptance of these terms and conditions. If you have any questions or concerns, please contact us at smartedu@gmail.com.</p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a href="index.php" class="btn btn-primary">Back to Registration</a>

                </div>
            </div>

        </div>
    </section>



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