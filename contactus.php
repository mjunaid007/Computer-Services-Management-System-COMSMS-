<?php
session_start();
error_reporting(0);

include('admin/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

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
<!-- zoom effect -->
<link rel='stylesheet' href='css/hizoom.css'>
<!-- end zoom effect -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="contact_us">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
<?php include_once('includes/header.php');?>
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Contact</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Contact</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="full">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 adress_cont margin_bottom_30">

              <h4>Address</h4>
              <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. sed do eiusmod tempor.</p>
              <div class="information_bottom left-side margin_bottom_20_all">
                <div class="icon_bottom"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                <div class="info_cont">
                
                  <p><?php  echo $row['PageDescription'];?></p>
                </div>
              </div>
              <div class="information_bottom left-side margin_bottom_20_all">
                <div class="icon_bottom"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                <div class="info_cont">
                  <h4><?php  echo $row['MobileNumber'];?></h4>
                  <p>Mon-Fri 8:30am-6:30pm</p>
                </div>
              </div>
              <div class="information_bottom left-side">
                <div class="icon_bottom"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                <div class="info_cont">
                  <h4><?php  echo $row['Email'];?></h4>
                  <p>24/7 online support</p>
                </div>
              </div><?php } ?>
            </div>
         
        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


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
<!-- zoom effect -->
<script src='js/hizoom.js'></script>
<script>
        $('.hi1').hiZoom({
            width: 300,
            position: 'right'
        });
        $('.hi2').hiZoom({
            width: 400,
            position: 'right'
        });
    </script>
</body>
</html>
