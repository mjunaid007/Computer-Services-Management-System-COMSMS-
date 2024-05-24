<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsaid']==0)) {
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
                                    <h4 class="font-size-18">Dashboard</h4>
                                    <?php
$aid=$_SESSION['comsmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$aid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item active"><?php  echo $row['AdminName'];?> Welcome to Dashboard</li><?php  } ?>
                                    </ol>
                                </div>
                            </div>

                        
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/01.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Service</h5>
                                            <?php
                 $query=mysqli_query($con,"Select * from tblservice");
$totser=mysqli_num_rows($query);
?>
                                            <h4 class="font-weight-medium font-size-24"><?php echo $totser;?> <i
                                                    class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                           
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="manage-services.php" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">View All</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/02.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Users</h5>
                                            <?php
                 $query=mysqli_query($con,"Select * from tbluser");
$totuser=mysqli_num_rows($query);
?>
                                            <h4 class="font-weight-medium font-size-24"><?php echo $totuser;?> <i
                                                    class="mdi mdi-arrow-down text-danger ml-2"></i></h4>
                                            
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="customer-list.php" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">View All</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/03.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Invoice</h5>
                                            <?php
                 $query=mysqli_query($con,"Select distinct BillingId from tblinvoice");
$totinv=mysqli_num_rows($query);
?>
                                            <h4 class="font-weight-medium font-size-24"><?php echo $totinv;?> <i
                                                    class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                            
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="invoices.php" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">View All</p>
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

</html><?php  } ?>