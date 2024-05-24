<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsaid']==0)) {
  header('location:logout.php');
  } else{
    // Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from tblservice where ID=$rid");

 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-services.php'</script>";     


}
   
?>
<!doctype html>
<html lang="en">

    <head>
        <title>Manage Services | Computer Service Management System</title>
       
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
                                    <h4 class="font-size-18">Manage Service</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">Service</li>
                                        <li class="breadcrumb-item">View Service</li>
                                        
                                    </ol>
                                </div>
                            </div>

                        
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title" style="color: red;font-size: 25px">Manage Services</h4>
                                        

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Service Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Creation Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
$ret=mysqli_query($con,"select * from tblservice");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php  echo $row['ServiceName'];?></td>
                    <td><img src="images/<?php  echo $row['Image'];?>" width="100" height="100"></td>
                                                
                                                <td><?php  echo $row['Price'];?></td>
                                                <td><?php  echo $row['CreationDate'];?></td>
                                                  <td><a href="manage-services.php?delid=<?php echo ($row['ID']);?>" onclick="return confirm('Do you really want to Delete ?');"><i class="fa fa-trash" aria-hidden="true"></i></a> || <a href="edit-service-detail.php?editid=<?php echo htmlentities ($row['ID']);?>"><i class="mdi mdi-pencil-box-multiple
" aria-hidden="true"></i></a></td>
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