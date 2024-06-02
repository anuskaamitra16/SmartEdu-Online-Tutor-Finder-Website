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
                    <h2><strong>Terms and Conditions for Tutors</strong></h2>
                    <p>Welcome to SmartEDU - Online Tutor Finder ! Before you proceed to register as a tutor on our platform, please carefully read and understand the following terms and conditions:</p>

                    <!-- Terms List -->
                    <ul>
                        <li>
                            <strong>Eligibility:</strong> By registering as a tutor on SmartEDU, you confirm that you are at least 18 years of age and legally eligible to enter into a contract.
                        </li>
                        <li>
                            <strong>Accuracy of Information:</strong> You agree to provide accurate and up-to-date information during the registration process. This includes your personal details, qualifications, and any other information required for your profile.
                        </li>
                        <li>
                            <strong>Tutoring Services:</strong> As a tutor on our platform, you agree to provide tutoring services in a professional and ethical manner. This includes delivering high-quality instruction, adhering to scheduled sessions, and maintaining appropriate communication with students.
                        </li>
                        <li>
                            <strong>Payment Terms:</strong> SmartEDU facilitates payments for tutoring services provided through our platform. All payments from students will be processed securely through our integrated payment gateway.
                        </li>
                        <li>
                            <strong>Prepayment Requirement:</strong> You acknowledge and agree that students are required to prepay for tutoring sessions before scheduling appointments. This prepayment ensures the financial commitment of students and minimizes the risk of non-payment or disputes.
                        </li>
                        <li>
                            <strong>Booking Confirmation:</strong> Upon receiving payment from the student, SmartEDU will confirm the booking and notify you of the scheduled tutoring session. You are responsible for honoring the agreed-upon appointment time and delivering the tutoring services as scheduled.
                        </li>
                        <li>
                            <strong>Payment Disbursement:</strong> Payments for tutoring services will be held securely by SmartEDU until the completion of the tutoring session. Once the session has been successfully conducted and completed, the payment will be disbursed to your designated payment account within 3-5 business days.
                        </li>
                        <li>
                            <strong>Cancellation and Refunds:</strong> In the event of a cancellation initiated by the student, SmartEDU will refund the payment according to our cancellation policy. You will not be entitled to receive payment for canceled sessions unless the cancellation is due to extenuating circumstances approved by SmartEDU.
                        </li>
                        <li>
                            <strong>Dispute Resolution:</strong> In case of disputes regarding payments or services rendered, SmartEDU will mediate and facilitate resolution between you and the student. You agree to cooperate in good faith to resolve any disputes in a timely and professional manner.
                        </li>
                        <li>
                            <strong>Fee Deductions:</strong> SmartEDU may deduct a service fee or commission from the total payment received for tutoring services. The applicable fee percentage will be clearly communicated to you upon registration as a tutor on our platform.
                        </li>
                        <li>
                            <strong>Tax Responsibility:</strong> As an independent contractor, you are responsible for reporting and paying any applicable taxes on income earned through tutoring services provided via SmartEDU. SmartEDU will not withhold taxes on your behalf.
                        </li>
                        <li>
                            <strong>Privacy Policy:</strong> By using our platform, you agree to abide by our Privacy Policy, which outlines how we collect, use, and protect your personal information.
                        </li>
                        <li>
                            <strong>Changes to Terms and Conditions:</strong> SmartEDU reserves the right to modify these terms and conditions at any time. We will notify you of any changes, and your continued use of our platform constitutes acceptance of the revised terms.
                        </li>
                    </ul>

                    <!-- Additional Information -->
                    <p>By registering as a tutor on SmartEDU, you signify your acceptance of these terms and conditions. If you have any questions or concerns, please contact us at smartedu@gmail.com.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a href="index.php" onclick="showRegistrationModal()" onclick="goBackToRegistration()" class="btn btn-primary">Back to Registration</a>

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