<footer class="footer_style_2">
  <div class="container-fuild">
    <div class="row">
    
      <div class="footer_blog">
        <div class="row">
        
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Additional links</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="about-us.php"><i class="fa fa-angle-right"></i> About us</a></li>
              <li><a href="admin/login.php"><i class="fa fa-angle-right"></i> Admin</a></li>
              <li><a href="user/login.php"><i class="fa fa-angle-right"></i> Users</a></li>
              <li><a href="services.php"><i class="fa fa-angle-right"></i> Services</a></li>
              <li><a href="contactus.php"><i class="fa fa-angle-right"></i> Contact us</a></li>
            </ul>
          </div>
     
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Contact us</h2>
            </div>
             <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <p><?php  echo $row['PageDescription'];?><br>
              <span style="font-size:18px;">+<?php  echo $row['MobileNumber'];?></span>
              </p><?php } ?>
           
          </div>
        </div>
      </div>
      <div class="cprt">
        <strong style="font-size: 20px;color: white">Computer Service Management System @2023</strong>
      </div>
    </div>
  </div>
</footer>