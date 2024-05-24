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
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$uid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$uid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}



}
  ?>
<!doctype html>
<html lang="en">

    <head>
       
        <title>Change Password | Computer Service Management System</title>
        
     <?php include_once('includes/css.php'); ?>
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
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
                                    <h4 class="font-size-18">Change Password</h4>
                                                                   </div>
                            </div>

                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
        
                                        <form class="custom-validation"  method="post"  name="changepassword" onsubmit="return checkpass();">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" id="currentpassword" name="currentpassword" value="" class="form-control" required="true">
                                            </div>
        
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <div>
                                                 <input type="password" id="newpassword" name="newpassword" value="" class="form-control" required="true">
                                                </div>
                                               
                                            </div>
        
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <div>
                                                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" value="" required="true">
                                                </div>
                                            </div>
                                         
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