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
            background: linear-gradient(45deg, #CCEEFF, #E9EBEE, #D6EAF8, #FDCEC6, #CCCCEE, #FFBBFF, #C9F1FF, #E1F8DC);
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
        .star-rating {
  width: 270px;
  display: flex;
  flex-direction: row-reverse; /* Adjusted direction */
  justify-content: space-between;
}

input.star { 
  display: none; 
}

label.star {
  padding: 10px;
  font-size: 20px;
  color: #444;
  cursor: pointer;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
}

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}

 .form {
    max-width: 600px;
    margin-bottom: 50px;
    margin-left:27%;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.label {
    font-weight: bold;
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
}


.comment textarea {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top:10px;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
.form-group input[type="radio"] {
        margin-right: 10px; /* Adjust the margin as needed */
    }
    .form-group label {
        display: inline-block;
        vertical-align: middle;
        margin-bottom: 5px; /* Add some bottom margin to separate options */
    }

    h1 {
            
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top:15px;
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
<?php include("inc/stunotinav.html"); ?>
		<!-- End header -->
    
        <h1>Review Your Teacher</h1>
    <?php
    // Check if teacher_id is provided in the URL
    if(isset($_GET['teacher_id'])) {
        $teacher_id = $_GET['teacher_id'];
    } else {
        // If teacher_id is not provided, display an error message and exit
        echo "<p>Error: Teacher ID not provided.</p>";
        exit; // Stop further execution
    }
    ?>
    <div class="form">
    <!-- Review form goes here -->
    <form action="submit_review.php" method="post">
        <!-- Add star rating input -->
        <label class="label" for="">Overall Rating</label>
        <div class="star-rating">
    <input class="star star-5" id="star-5" type="radio" name="star" value="5">
    <label class="star" for="star-5"></label>
    
    <input class="star star-4" id="star-4" type="radio" name="star" value="4">
    <label class="star" for="star-4"></label>
    
    <input class="star star-3" id="star-3" type="radio" name="star" value="3">
    <label class="star" for="star-3"></label>
    
    <input class="star star-2" id="star-2" type="radio" name="star" value="2">
    <label class="star" for="star-2"></label>
    
    <input class="star star-1" id="star-1" type="radio" name="star" value="1">
    <label class="star" for="star-1"></label>
</div>

<input type="hidden" id="starRate" name="rating" value="0">

        <div class="form-group">
        <label class="label" for="question1">Question 1: How was the teacher's knowledge?</label><br>
        <input type="radio" id="q1_5" name="question1" value="5"><label for="q1_5">Excellent</label>
        <input type="radio" id="q1_4" name="question1" value="4"><label for="q1_4">Good</label>
        <input type="radio" id="q1_3" name="question1" value="3"><label for="q1_3">Average</label>
        <input type="radio" id="q1_2" name="question1" value="2"><label for="q1_2">Poor</label>
        <input type="radio" id="q1_1" name="question1" value="1"><label for="q1_1">Bad</label>
    </div>
    <div class="form-group">
        <label class="label" for="question2">Question 2: How was the teacher's communication?</label><br>
        <input type="radio" id="q2_5" name="question2" value="5"><label for="q2_5">Excellent</label>
        <input type="radio" id="q2_4" name="question2" value="4"><label for="q2_4">Good</label>
        <input type="radio" id="q2_3" name="question2" value="3"><label for="q2_3">Average</label>
        <input type="radio" id="q2_2" name="question2" value="2"><label for="q2_2">Poor</label>
        <input type="radio" id="q2_1" name="question2" value="1"><label for="q2_1">Bad</label>
    </div>
    <div class="form-group">
    <label class="label" for="question3">Question 3: Was the teacher helpful and supportive?</label><br>
    <input type="radio" id="q3_5" name="question3" value="5"><label for="q4_5">Very helpful and supportive</label>
    <input type="radio" id="q3_4" name="question3" value="4"><label for="q4_4">Helpful and supportive</label>
    <br><input type="radio" id="q3_3" name="question3" value="3"><label for="q4_3">Neutral</label>
    <input type="radio" id="q3_2" name="question3" value="2"><label for="q4_2">Not very helpful and supportive</label>
    <br><input type="radio" id="q3_1" name="question3" value="1"><label for="q4_1">Not helpful and supportive at all</label>
</div>

<div class="form-group">
    <label class="label" for="question4">Question 4: How satisfied were you with the teaching style?</label><br>
    <input type="radio" id="q4_5" name="question4" value="5"><label for="q5_5">Very satisfied</label>
    <input type="radio" id="q4_4" name="question4" value="4"><label for="q5_4">Satisfied</label>
    <input type="radio" id="q4_3" name="question4" value="3"><label for="q5_3">Neutral</label>
    <input type="radio" id="q4_2" name="question4" value="2"><label for="q5_2">Dissatisfied</label>
    <input type="radio" id="q4_1" name="question4" value="1"><label for="q5_1">Very dissatisfied</label>
</div>

        <div class="comment">
            <label class="label" for="comment">Additional Comments:</label><br>
            <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
        </div>
        
        <!-- Hidden input to store teacher_id -->
        <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
        
        <!-- Add a submit button -->
        <button type="submit" name="send">Submit Review</button>
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
    <script>
      // Get all star labels
const starLabels = document.querySelectorAll('.star-rating label');

// Get the hidden input field for star rating
const starRateInput = document.querySelector('#starRate');

// Loop through each star label
starLabels.forEach(label => {
    // Add click event listener to each star label
    label.addEventListener('click', () => {
        // Set the value of the hidden input field to the value of the clicked star
        starRateInput.value = label.getAttribute('for').split('-')[1];
        console.log(starRateInput.value); // Add this line for debugging
    });
});



    </script>
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
