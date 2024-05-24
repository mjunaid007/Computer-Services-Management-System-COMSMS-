<header id="default_header" class="header_style_1">
  <!-- header top -->
  <div class="header_top">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="full">
            <div class="topbar-left">
              <ul class="list-inline">
                <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight"><?php  echo $row['PageDescription'];?></span> </li>
                <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><?php  echo $row['Email'];?></span> </li><?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 right_section_header_top">
          <div class="float-left">
            <div class="social_icon">
              <ul class="list-inline">
                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- end header top -->
  <!-- header bottom -->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
         
          <div class="logo"> <h3 style="color: red">Computer Services</h3> </div>
          
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
          <!-- menu start -->
          <div class="menu_side">
            <div id="navbar_menu">
              <ul class="first-ul">
                <li> <a class="active" href="index.php">Home</a>
                  
                </li>
                <li><a href="about-us.php">About Us</a></li>
                <li> <a href="services.php">Services</a>
                  
                </li>
                <li> <a href="admin/login.php">Admin</a>
                 
                </li>
                <li> <a href="user/login.php">Users</a>
                  
                </li>
                
                <li> <a href="contactus.php">Contact</a>
                 
                </li>
              </ul>
            </div>
          
          </div>
          <!-- menu end -->
        </div>
      </div>
    </div>
  </div>
  <!-- header bottom end -->
</header>