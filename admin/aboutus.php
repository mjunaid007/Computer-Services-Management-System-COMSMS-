<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsaid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {
    $comsmsaid=$_SESSION['comsmsaid'];
     $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
     $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
    if ($query) {
 
    echo '<script>alert("About Us has been updated.")</script>';
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
       
        <title>About Us | Computer Service Management System</title>
        
     <?php include_once('includes/css.php'); ?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
                                    <h4 class="font-size-18">About Us</h4>
                                                                   </div>
                            </div>

                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
        
                                        <form class="custom-validation"  method="post" enctype="multipart/form-data">
                                           <?php
                
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
                                            <div class="form-group">
                                                <label>Page Title</label>
                                                <input type="text" class="form-control" name="pagetitle" id="pagetitle" value="<?php  echo $row['PageTitle'];?>" required="true">
                                            </div>
        
                                            <div class="form-group">
                                                <label>Page Description</label>
                                                <div>
                                                 <textarea name="pagedes" id="pagedes" rows="5" class="form-control">
        <?php  echo $row['PageDescription'];?></textarea>
                                                </div>
                                               
                                            </div>
        
                                    <?php 
$cnt=$cnt+1;
}?>        
                                     
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit">
                                                       Update
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