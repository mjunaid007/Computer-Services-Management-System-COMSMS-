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
        <title>Between Dates Reports | Computer Service Management System</title>
       
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
                                    <h4 class="font-size-18">Between Dates Reports</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">Reports</li>
                                        <li class="breadcrumb-item">Between Dates Reports</li>
                                       
                                    </ol>
                                </div>
                            </div>

                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4>Between dates reports:</h4>
 <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <tr> 
                                <th>#</th> 
                                <th>Invoice Id</th> 
                                <th>Customer Name</th> 
                                <th>Invoice Date</th> 
                                <th>Action</th>
                            </tr> 
                                            </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
$ret=mysqli_query($con,"select distinct tbluser.FullName,tblinvoice.BillingId,tblinvoice.InvoiceDate from  tbluser   
    join tblinvoice on tbluser.ID=tblinvoice.Userid  where date(tblinvoice.InvoiceDate) between '$fdate' and '$tdate' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                             <tr> 
                            <th scope="row"><?php echo $cnt;?></th> 
                            <td><?php  echo $row['BillingId'];?></td>
                            <td><?php  echo $row['FullName'];?></td>
                            <td><?php  echo $row['InvoiceDate'];?></td> 
                                <td><a href="view-invoice.php?invoiceid=<?php  echo $row['BillingId'];?>">View</a></td> 

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