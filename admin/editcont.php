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

    // Fetch details based on 'cid'
    $sel = "SELECT * FROM contact WHERE cid = $tid";
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Contact Forms</h1>
                    <form action="updcont.php" method="post">
                    <p><input type="hidden" name="id" value="<?php echo $row['cid'];?>"></p>
                    <p>Name</p>
                    <p><input type="text" name="name" value="<?php echo $row['name'];?>"></p>
                    <p>Type</p>
                    <p><input type="text" name="type" value="<?php echo $row['type'];?>"></p>
                    <p>Email</p>
                    <p><input type="email" name="email" value="<?php echo $row['email'];?>"></p>
                    <p>Phone</p>
                    <p><input type="number" name="phone" value="<?php echo $row['phone'];?>"></p>
                    <p>Problem</p>
                    <p><input type="text" name="prob" value="<?php echo $row['problem'];?>"></p>
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