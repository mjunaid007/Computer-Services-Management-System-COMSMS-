<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
$password=md5($_POST['newpassword']);
        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
      $query1=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";

   }
     
    }
    else{
    
      echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
  }
  ?>
<!doctype html>
<html lang="en">

    <head>
        <title>Forgot Password | Computer Service Management System</title>       
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
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

    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                     <strong style="color: blue;font-size: 20px">COMSMS!!!!</strong>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Forgot Password !</h4>
                                <p class="text-muted text-center">Reset your password.</p>

                              <form class="mt-4" method="post" name="changepassword" onsubmit="return checkpass();">

                                <div class="form-group">
                                    <label >Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required="true">
                                </div>
    <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" name="contactno" placeholder="Contact Number" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">New Password</label>
                                    <input type="password" class="form-control" id="userpassword" name="newpassword" placeholder="New Password">
                                </div>
    <div class="form-group">
                                    <label for="userpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="userpassword" name="confirmpassword" placeholder="Confirm Password">
                                </div>
                                <div class="form-group row">
                                   
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit">Reset</button>
                                    </div>
                                </div>

                              
 <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>
                                    </div>
                                </div>
                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Register yourself||||<a href="user-register.php" class="font-weight-medium text-primary"> Register </a> </p>
                               <p>© <script>document.write(new Date().getFullYear())</script> Computer <i class="mdi mdi-heart text-danger"></i> Service Management System</p>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
