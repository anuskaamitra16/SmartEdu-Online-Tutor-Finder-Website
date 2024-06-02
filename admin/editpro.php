<?php
session_start();
if(!isset($_SESSION['an'])){
header("location:index.php");
}
?>
<?php
include("admin_inc/db.php");
if(isset($_GET['eid'])) {
    $tid = $_GET['eid'];

    // Fetch student details based on 'sid'
    $sel = "SELECT * FROM teachprofile WHERE teid = $tid";
    $rs = $con->query($sel);
    $row = $rs->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SmartEDU Admin </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
<?php include ("admin_inc/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
<?php include("admin_inc/top.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Teachers Profiles</h1>
                    <form action="updpro.php" method="post" enctype="multipart/form-data">
                    <p><input type="hidden" name="id" value="<?php echo $row['teid'];?>"></p>
                    <p>Name</p>
                    <p><input type="text" name="name" value="<?php echo $row['name'];?>"></p>
                    <p>Image</p>
                    <p><input type="file" class="form-control-file" name="img" id="profileImage">
                    <img src="img/pics/<?php echo $row['timg'];?>" style="width:100px;"></label>
                    </p>
                    
                    <p>Gender</p>
                    <p><input type="radio" name="gender" value="Male" <?php if ($row['gender']=== "Male") echo "checked"; ?>>Male</p>
                    <p><input type="radio" name="gender" value="Female" <?php if ($row['gender']=== "Female") echo "checked"; ?>>Female</p>
                    <p>Qualification</p>
                    <p><input type="text" name="qua" value="<?php echo $row['qualification'];?>"></p>
                    <p>Subjects</p>
                    <?php 
                    $sb=explode(",",$row['subjects']);
                    ?>
                    <p><input type="checkbox" name="sub[]" value="Maths" <?php if (in_array("Maths",$sb)){echo "checked"; }?>>Maths</p>
                    <p><input type="checkbox" name="sub[]" value="English" <?php if (in_array("English",$sb)){echo "checked"; }?>>English</p>
                    <p><input type="checkbox" name="sub[]" value="SST" <?php if (in_array("SST",$sb)){echo "checked"; }?>>SST</p>
                    <p><input type="checkbox" name="sub[]" value="Science" <?php if (in_array("Science",$sb)){echo "checked"; }?>>Science</p>
                    <p><input type="checkbox" name="sub[]" value="Computer" <?php if (in_array("Computer",$sb)){echo "checked"; }?>>Computer</p>
                    <p><input type="checkbox" name="sub[]" value="Bengali" <?php if (in_array("Bengali",$sb)){echo "checked"; }?>>Bengali</p>
                    <p><input type="checkbox" name="sub[]" value="Hindi" <?php if (in_array("Hindi",$sb)){echo "checked"; }?>>Hindi</p>
                    <p>Experience</p>
                    <p><input type="number" name="exp" value="<?php echo $row['experience'];?>"></p>
                    <p>Preferences</p>
                    <p><input type="checkbox" name="teach[]" value="Online" <?php if (strpos($row['preferences'], "Online") !== false) echo "checked"; ?>>Online</p>
                    <p><input type="checkbox" name="teach[]" value="Student's Place" <?php if (strpos($row['preferences'], "Student's Place") !== false) echo "checked"; ?>>Student's Place</p>
                    <p><input type="checkbox" name="teach[]" value="Teacher's Place" <?php if (strpos($row['preferences'], "Teacher's Place") !== false) echo "checked"; ?>>Teacher's Place</p>
                    <p>Salary</p>
                    <p><input type="text" name="sal" value="<?php echo $row['salary'];?>"></p>
                    <p><input type="submit" name="edit" value="Save"></p>
                    </form>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("admin_inc/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("admin_inc/logout_modal.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>