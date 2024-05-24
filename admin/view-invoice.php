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
                                    <h4 class="font-size-18">Invoice Detail</h4>
                                  
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
                                    <div class="card-body" id="exampl">

                                        <h4 class="card-title">Invoice Details</h4>

                    
    <?php
    $invid=intval($_GET['invoiceid']);
$ret=mysqli_query($con,"select DISTINCT  tblinvoice.InvoiceDate,tbluser.FullName,tbluser.Email,tbluser.MobileNumber
    from  tblinvoice 
    join tbluser on tbluser.ID=tblinvoice.Userid 
    where tblinvoice.BillingId='$invid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <table class="table table-bordered" width="100%" border="1"> 
                                            <h4>Invoice #<?php echo $invid;?></h4>
<tr>
<th colspan="6" style="color: blue;font-size: 20px;">Customer Details</th>   
</tr>

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
                        <table class="table table-bordered" width="100%" border="1"> 
<tr>
<th colspan="3">Services Details</th>   
</tr>
<tr>
<th>#</th>  
<th>Service</th>
<th>Cost</th>
</tr>

<?php
$ret=mysqli_query($con,"select tblservice.ServiceName,tblservice.Price  
    from  tblinvoice 
    join tblservice on tblservice.ID=tblinvoice.ServiceId 
    where tblinvoice.BillingId='$invid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
    ?>

<tr>
<th><?php echo $cnt;?></th>
<td><?php echo $row['ServiceName']?></td>   
<td><?php echo $subtotal=$row['Price']?></td>
</tr>
<?php 
$cnt=$cnt+1;
$gtotal+=$subtotal;
} ?>

<tr>
<th colspan="2" style="text-align:center" style="color: blue;font-size: 20px;">Grand Total</th>
<th><?php echo $gtotal?></th>   

</tr>
</table>
  <p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p> 
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
<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
//WinPrint.close();
}
</script>
    </body>
</html>
<?php  } ?>