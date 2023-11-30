<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="POS - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
  <meta name="author" content="Dreamguys - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">
  <title>Inventory Management </title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/xx.png">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/css/animate.css">

  <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.theme.default.min.css">

  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div id="global-loader">
    <div class="whirly-loader"> </div>
  </div>
  <div class="main-wrappers">
    <div class="header">

      <div class="header-left border-0 ">
        <a href="pos.php" class="logo">
        <img src="assets/img/IM123.png" alt="" style="height:100px; width:100%">
        </a>
        <a href="pos.php" class="logo-small">
        <img src="assets/img/IM123.png" alt="" style="height: 100px; width:100%">
        </a>
      </div>


      <ul class="nav user-menu">
      

        <li class="nav-item">
          <div class="top-nav-search">
            <a href="javascript:void(0);" class="responsive-search">
              <i class="fa fa-search"></i>
            </a>
            <form action="#">
              <div class="searchinputs">
                <input type="text" placeholder="Search Here ...">
                <div class="search-addon">
                  <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                </div>
              </div>
              <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
            </form>
          </div>
        </li>
        <li class="nav-item">
                    <a href="cart.php" class="nav-link">cart</a>
        </li>


       
        <?php
        session_start();
        include('dbcontroller.php');
        include('dbcon.php');
        ?>

          
              
        <li class="nav-item dropdown has-arrow main-drop">
        <?php
                $u_mail = $_SESSION['email'];

                $sel = "SELECT  `u_id`,`u_name`,`u_img` FROM `login` WHERE `u_mail`='$u_mail'";
                $query = mysqli_query($conn, $sel);
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $admin) {

                ?>
          <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
            <span class="user-img"><img src="assets/img/customer/<?=$admin['u_img']?>" alt="">
              <span class="status online"></span></span>
          </a>
          <?php   $_SESSION['userid']=$admin['u_id'];?>
          <div class="dropdown-menu menu-drop-user">
            <div class="profilename">
           
              <div class="profileset">
                <span class="user-img"><img src="assets/img/customer/<?=$admin['u_img']?>" alt="">
                  <span class="status online"></span></span>
                <div class="profilesets">
                  <h6><?=$admin['u_name']?></h6>
                  <h5>User</h5>
                </div>
              </div>
            
              <hr class="m-0">

              <a class="dropdown-item" href="profile1.php"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user me-2">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg> My Profile</a>
              <a class="dropdown-item logout pb-0" href="index.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
            </div>
          </div>
          <?php
                    }
                  }
              ?>
        </li>
      </ul>


      <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="profile1.php">My Profile</a>
          
          <a class="dropdown-item" href="index.php">Logout</a>
        </div>
      </div>

    </div>