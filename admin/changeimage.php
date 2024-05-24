<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsaid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {
    $img=$_FILES["image"]["name"];
$extension = substr($img,strlen($img)-4,strlen($img));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$newimg=md5($img).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$newimg);
$eid=$_GET['editid'];
    $query=mysqli_query($con, "update tblservice set Image='$newimg' where ID='$eid'");
    if ($query) {
 
    echo '<script>alert("Service image has been updated")</script>';
    echo "<script>window.location.href ='manage-services.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }
}
  ?>
<!doctype html>
<html lang="en">

    <head>
       
        <title>Update Services | Computer Service Management System</title>
        
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
                                    <h4 class="font-size-18">Update Services Image</h4>
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
                $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblservice where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
                                            <div class="form-group">
                                                <label>Service Name</label>
                                                <input type="text" class="form-control" name="sname" value="<?php  echo $row['ServiceName'];?>" required='true'>
                                            </div>
        
                                            <div class="form-group">
                                                <label>Old Image</label>
                                                <div>
                                                
                                                 <img src="images/<?php  echo $row['Image'];?>" width="100" height="100">
                                                </div>
                                               
                                            </div>
        
                                            <div class="form-group">
                                                <label>New Image</label>
                                                <div>
                                                    <input type="file" class="form-control" name="image" value="" required='true'>
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