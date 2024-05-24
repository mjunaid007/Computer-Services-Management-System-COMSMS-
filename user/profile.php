<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsuid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {
    $uid=$_SESSION['comsmsuid'];
    $fname=$_POST['fname'];
   
     $query=mysqli_query($con, "update tbluser set FullName='$fname' where ID='$uid'");
    if ($query) {
 
    echo '<script>alert("Profile has been updated")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }
  ?>
<!doctype html>
<html lang="en">

    <head>
       
        <title>User Profile | Computer Service Management System</title>
        
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
                                    <h4 class="font-size-18">User Profile</h4>
                                                                   </div>
                            </div>

                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
        
                                        <form class="custom-validation"  method="post">
                                            <?php
$uid=$_SESSION['comsmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" name="fname" value="<?php  echo $row['FullName'];?>" required='true'>
                                            </div>
        
                                           
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div>
                                                    <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" readonly='true'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <div>
                                                    <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" readonly='true' maxlength='10'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Registration Date</label>
                                                <div>
                                                    <input type="text" class="form-control" name="" value="<?php  echo $row['RegDate'];?>" readonly="true">
                                                </div>
                                            </div>
                                         <?php } ?>
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit">
                                                        Submit
                                                    </button>
                                                   
                                                </div>
                                            </div>
                                        </form>
        
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

        <div class="rightbar-overlay"></div>
 <?php include_once('includes/js.php');?>

    </body>
</html>
<?php }  ?>