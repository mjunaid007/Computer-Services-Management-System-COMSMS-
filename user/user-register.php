<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName,FatherName,MobileNumber,Email,Password) value('$fname','$fname','$contno','$email','$password' )");
    if ($query) {
  
    echo "<script>alert('You have successfully registered');</script>";
  }
  else
    {
      
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}

 ?>
<!doctype html>
<html lang="en">

    <head>
        
        <title>User Registeration | Computer Service Management System</title>
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

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

                                <h4 class="font-size-18 mt-5 text-center">Free Register</h4>
                                <p class="text-muted text-center">Get your free account now.</p>

                              <form class="mt-4" method="post" onsubmit="return checkpass();">
                                 <div class="form-group">
                                    <label for="useremail2">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" autofocus name="fname" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="useremail">Father Name</label>
                                    <input type="text" class="form-control" placeholder="Father Name" autofocus name="fname" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="useremail">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="username">Contact Number</label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" autofocus name="contactno" required="true" maxlength="10" pattern="[0-9]+">
                                </div>
    

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter password"  name="password">
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit">Register</button>
                                    </div>
                                </div>

                               
                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Already have an account ? <a href="login.php" class="font-weight-medium text-primary"> Login </a> </p>
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
