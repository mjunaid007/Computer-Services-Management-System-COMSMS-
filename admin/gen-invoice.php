<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['comsmsaid']==0)) {
  header('location:logout.php');
  } else{
  if(isset($_POST['submit'])){


$uid=intval($_GET['uid']);
$invoiceid=mt_rand(100000000, 999999999);
$sid=$_POST['sids'];
for($i=0;$i<count($sid);$i++){
   $svid=$sid[$i];
$ret=mysqli_query($con,"insert into tblinvoice(Userid,ServiceId,BillingId) values('$uid','$svid','$invoiceid');");


echo '<script>alert("Invoice created successfully. Invoice number is "+"'.$invoiceid.'")</script>';
echo "<script>window.location.href ='invoices.php'</script>";
}
}
   
?>
<!doctype html>
<html lang="en">

    <head>
        <title>Generate Invoice | Computer Service Management System</title>
       
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
                                    <h4 class="font-size-18">Invoice Generation</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">Invoice</li>
                                        <li class="breadcrumb-item">Gen Invoice</li>
                                        
                                    </ol>
                                </div>
                            </div>

                           
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                      
                                        <table class="table table-bordered" width="100%" border="1"> 
<tr>
<th colspan="6" style="color: blue;font-size: 20px;">Customer Details</th>   
</tr>
<?php
$uid=$_GET['uid'];
$ret=mysqli_query($con,"select * from tbluser where ID ='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                             <tr style="color: red;font-size: 15px;"> 
                                <th>Name</th> 
                                <td><?php echo $row['FullName']?></td> 
                                <th>Contact no.</th> 
                                <td><?php echo $row['MobileNumber']?></td>
                                <th>Email </th> 
                                <td><?php echo $row['Email']?></td>
                            </tr> 
                           
<?php }?>
</table> 

 <form method="post">
                        <table class="table table-bordered"> <thead> <tr> <th>#</th> <th>Service Name</th> <th>Action</th> </tr> </thead> <tbody>
<?php
$ret=mysqli_query($con,"select *from  tblservice");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

 <tr> 
<th scope="row"><?php echo $cnt;?></th> 
<td><?php  echo $row['ServiceName'];?></td> 
 
<td><input type="checkbox" name="sids[]" value="<?php  echo $row['ID'];?>" ></td> 
</tr>   
<?php 
$cnt=$cnt+1;
}?>

<tr>
<td colspan="4" align="center">
<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>     
</td>

</tr>

</tbody> </table> 
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
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
<?php include_once('includes/js.php');?>

    </body>
</html>
<?php  } ?>