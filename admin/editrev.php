<?php
session_start();
if (!isset($_SESSION['an'])) {
    header("location:index.php");
}
include("admin_inc/db.php");

// Check if 'eid' is provided in the URL
if (isset($_GET['eid'])) {
    $rid = $_GET['eid'];

    // Fetch review details based on 'eid'
    $sel = "SELECT r.review_id, r.rating, r.review_text, s.name AS student_name, t.name AS teacher_name
            FROM reviews r
            JOIN students s ON r.student_id = s.sid
            JOIN teachers t ON r.teacher_id = t.tid
            WHERE review_id = $rid";
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

    <title>SmartEDU Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("admin_inc/sidebar.php"); ?>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Review Form</h1>
                    <form action="updrev.php" method="post">
                        <input type="hidden" name="review_id" value="<?php echo $row['review_id']; ?>">
                        
                        
                            <p><label for="student_name">Student Name</label></p>
                            <p><input type="text" id="student_name" value="<?php echo $row['student_name']; ?>" readonly></p>
                        
                           <p> <label for="teacher_name">Teacher Name</label></p>
                            <p><input type="text" id="teacher_name" value="<?php echo $row['teacher_name']; ?>" readonly></p>
                        
                           <p> <label for="rating">Rating</label></p>
                           <p> <input type="number"  id="rating" name="rating" value="<?php echo $row['rating']; ?>" min="1" max="5" required></p>
                            <p><label for="review_text">Additional Comments</label></p>
                            <p><textarea  id="review_text" name="review_text" rows="4" required><?php echo $row['review_text']; ?></textarea></p>
                       <p> <button type="submit" name="editrev" class="btn btn-primary">Save</button></p>
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
