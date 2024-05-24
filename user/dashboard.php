<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsuid']==0)) {
  header('location:logout.php');
  } else{
    
   
?>
<!doctype html>
<html lang="en">

    <head>
        
        <title>Dashboard | Computer Service Management System</title>
       

        <?php include_once('includes/css.php'); ?>

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php include_once('includes/header.php');?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include_once('includes/sidebar.php');?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4 class="font-size-18" style="color: blue">Dashboard</h4>
                                  
                                </div>
                            </div>

                        
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                         
                                             <?php
$uid=$_SESSION['comsmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                            <h4 class="font-weight-medium font-size-24">Welcome Back !!!! <?php  echo $row['FullName'];?> </h4><?php } ?>
                                           
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                
             <?php include_once('includes/footer.php');?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
     <?php include_once('includes/js.php');?>

    </body>

</html>
<?php  } ?>