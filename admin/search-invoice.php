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
        <title>Search Invoice | Computer Service Management System</title>
       
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
                                    <h4 class="font-size-18">Search Invoice</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">Search Invoice</li>
                                        <li class="breadcrumb-item">View Invoice</li>
                                     
                                    </ol>
                                </div>
                            </div>

                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
        
                                        <form class="custom-validation"  method="post" enctype="multipart/form-data">
                                            
                                            <div class="form-group">
                                                <label>Search By Invoice Number</label>
                                                 <input type="text" class="form-control" name="searchdata" value="" required='true'>
                                            </div>
        
                                             
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="search">
                                                       Search
                                                    </button>
                                                   
                                                </div>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                        </div>
 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
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
    join tblinvoice on tbluser.ID=tblinvoice.Userid  where tblinvoice.BillingId like '%$sdata%' ");
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
}  }  ?>
                                         
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