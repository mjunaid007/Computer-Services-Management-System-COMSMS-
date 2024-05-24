<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsaid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {
    $sname=$_POST['sname'];
    $sdes=$_POST['sdes'];
    $price=$_POST['price'];
$img=$_FILES["image"]["name"];
$extension = substr($img,strlen($img)-4,strlen($img));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$newimg=md5($img).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$newimg);
    $query=mysqli_query($con, "insert into  tblservice(ServiceName,ServiceDes,Image,Price) value('$sname','$sdes','$newimg','$price')");
    if ($query) {
 
    echo '<script>alert("Sevice has been added")</script>';
    echo "<script>window.location.href ='add-services.php'</script>";
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
       
        <title>Add Services | Computer Service Management System</title>
        
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
                                    <h4 class="font-size-18">Add Services</h4>
                                                                   </div>
                            </div>

                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
        
                                        <form class="custom-validation"  method="post" enctype="multipart/form-data">
                                            
                                            <div class="form-group">
                                                <label>Service Name</label>
                                                <input type="text" class="form-control" name="sname" value="" required='true'>
                                            </div>
        
                                            <div class="form-group">
                                                <label>Service Description</label>
                                                <div>
                                                
                                                 <textarea required='true' class="form-control" rows="5" name="sdes"></textarea>
                                                </div>
                                               
                                            </div>
        
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div>
                                                    <input type="file" class="form-control" name="image" value="" required='true'>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label>Service Price</label>
                                                <div>
                                                
                                                 <input type="text" class="form-control" name="price" value="" required='true'>
                                                </div>
                                               
                                            </div>
                                     
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit">
                                                       Add
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