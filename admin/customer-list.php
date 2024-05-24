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
        <title>Customer List | Computer Service Management System</title>
       
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
                                    <h4 class="font-size-18">Customer List</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">Customers</li>
                                        <li class="breadcrumb-item">View Customer Details</li>
                                       
                                    </ol>
                                </div>
                            </div>

                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Customer Details</h4>
                                       

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Full Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Reg Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
$ret=mysqli_query($con,"select * from tbluser");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php  echo $row['FullName'];?></td>
                                                  <td><?php  echo $row['MobileNumber'];?></td>
                                                
                                                <td><?php  echo $row['Email'];?></td>
                                                <td><?php  echo $row['RegDate'];?></td>
                                                  <td><a href="gen-invoice.php?uid=<?php echo htmlentities ($row['ID']);?>">Generate Invoice</a></td>
                                            </tr>
                                        <?php 
$cnt=$cnt+1;
}?>
                                         
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

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
<?php include_once('includes/js.php');?>

    </body>
</html>
<?php  } ?>