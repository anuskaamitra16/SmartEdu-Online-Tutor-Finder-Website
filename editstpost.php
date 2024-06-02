<?php
include("data/db.php");
if(isset($_GET['eid'])) {
    $sid = $_GET['eid'];

    // Fetch student details based on 'sid'
    $sel = "SELECT * FROM studentpost WHERE pid = $sid";
    $rs = $con->query($sel);
    $row = $rs->fetch_assoc();
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
        font-family: Arial, sans-serif;
        background: linear-gradient(45deg, #ff9a9e, #fad0c4, #f8bfa8, #a18cd1, #fbc2eb);
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
    }

    @keyframes gradientAnimation {
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
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-check-input {
        margin-right: 10px;
    }

    .btn-primary {
        width: 100%;
    }

    @media (max-width: 768px) {
        .container1 {
            padding: 15px;
        }
    }
</style>

</head>
<body class="host_version"> 

<!-- Start header -->
<?php include("inc/editnav.html"); ?>
		<!-- End header -->
        <div class="container1">
        <h1>Update Post</h1>
        <form action="updpost.php" method="POST">
            <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $row['pid'];?>">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $row['name'];?>" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" class="form-control" id="class" required>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php if ($i == $row['class']) echo 'selected'; ?>>Class <?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subjects">Subjects for which you want tutor</label><br>
                <div class="form-check form-check-inline">
                <?php 
                $sb=explode(",",$row['subjects']);
                ?>
                
                    <input class="form-check-input" type="checkbox" name="sub[]" id="maths" value="Maths" <?php if (in_array("Maths",$sb)){echo "checked"; }?>>
                    <label class="form-check-label" for="maths">Maths</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sub[]" id="english" value="English" <?php if (in_array("English",$sb)){echo "checked"; }?>>
                    <label class="form-check-label" for="english">English</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sub[]" id="sst" value="SST" <?php if (in_array("SST",$sb)){echo "checked"; }?>>
                    <label class="form-check-label" for="sst">SST</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sub[]" id="science" value="Science" <?php if (in_array("Science",$sb)){echo "checked"; }?>>
                    <label class="form-check-label" for="science">Science</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sub[]" id="computer" value="Computer" <?php if (in_array("Computer",$sb)){echo "checked"; }?>>
                    <label class="form-check-label" for="computer">Computer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sub[]" id="bengali" value="Bengali" <?php if (in_array("Bengali",$sb)){echo "checked"; }?>>
                    <label class="form-check-label" for="bengali">Bengali</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sub[]" id="hindi" value="Hindi" <?php if (in_array("Hindi",$sb)){echo "checked"; }?>>
                    <label class="form-check-label" for="hindi">Hindi</label>
                </div>
                <!-- Add more subjects here -->
            </div>
            <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone number" value="<?php echo $row['phone'];?>"required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" id="location" placeholder="Enter your location " value="<?php echo $row['location'];?>" required>
        </div>
        <div class="form-group">
    <label for="budget">Budget</label>
    <input type="text" name="budget" class="form-control" id="budget" placeholder="Enter your budget" value="<?php echo $row['budget'];?>">
</div>

            <div class="form-group">
                <label for="additionalInfo">Additional Information</label>
                <?php $info = htmlspecialchars($row['info']); ?>
                <textarea class="form-control"  id="additionalInfo" name="info" rows="4" placeholder="Enter any additional information" required><?php echo $row['info']; ?></textarea>
                
            </div>
            <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
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
