<?php
session_start();
error_reporting(0);
include('admin/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- site metas -->
<title>About Us Page|| Computer Service Management System</title>

<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="css/colors1.css" />
<!-- custom css -->
<link rel="stylesheet" href="css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="css/animate.css" />
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
<?php include_once('includes/header.php');?>
<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Services</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Services</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->

<!-- section -->
<div class="section padding_layout_1 light_silver service_list">
  <div class="container">
    <div class="row">
      <?php

$ret=mysqli_query($con,"select * from tblservice");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
      <div class="col-md-4 service_blog">
        <div class="full">
          <div> <img src="admin/images/<?php  echo $row['Image'];?>" width="200"/> </div>
          <div class="service_cont">
            <h3 class="service_head"><?php  echo $row['ServiceName'];?></h3>
            <p><?php  echo $row['ServiceDes'];?>.</p>
            <p><strong>Price:</strong> <?php  echo $row['Price'];?></p>
           
            
          </div>
        </div>
      </div><?php } ?>
     
    
    </div>
  </div>
</div>
<!-- end section -->


<!-- end section -->


<?php include_once('includes/footer.php');?>
<!-- end footer -->
<!-- js section -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="js/menumaker.js"></script>
<!-- wow animation -->
<script src="js/wow.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->
</body>
</html>
