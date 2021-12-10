<?php
session_start([
    'cookie_lifetime' => 86400,
   ]);
if (!$_SESSION['workint']) {
   header("location: login.html");
} else {
   include("controller.php");
   $userid = $_SESSION['workint'];
   echo DB::query('SELECT email FROM users WHERE id = :id ' , array(':id'=>$userid))[0]['email'];
}
if (isset($_POST['signOut'])) {
    session_destroy();
}
 if (DB::query('SELECT userid FROM messages WHERE userid = :userid ' , array(':userid' => $userid))) {
 global  $status;
 $status = DB::query('SELECT status FROM messages WHERE userid = :userid ORDER BY id DESC LIMIT 1' , array(':userid'=>$userid))[0]['status'];
 } else {
     global $status ;
     $status = "true";
 }
 
 $msgCount = DB::query('SELECT message FROM messages WHERE userid = :userid AND status = "false"' , array(':userid'=>$userid));

 switch ($status) {
     case 'false':
        $icon = "Message";
        $countMsg = count($msgCount);
         break;
     
     default:
         $icon = "No message";
         $countMsg = 0;
         break;
 }
 $userInformation = DB::query('SELECT * FROM users WHERE id = :userid ', array(':userid'=> $userid))[0];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Covid Pandemic Benefits.">
  <meta name="author" content="cartzedan">
  <title>States50</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<style>
  .divImg {
    width: 100%;
    display: flex;
  }
  .imgDrive {
    width: 50%;
    margin: 4px;
    height: auto;
  /*  background-color: hotpink; */
    border: solid grey 1px ;
  }
  @media screen and (max-width: 768px) {
    .divImg {
    width: 100%;
    display: grid;
  }
  .imgDrive {
    width: 90%;
    margin: 5px;
    height: auto;
  /*  background-color: hotpink; */
    border: solid grey 1px ;

  }
}
</style>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/logo.png" class="navbar-brand-img" alt="...">States50
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="messages.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Notification & Messages</span>
              </a>
            </li> -->
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          
          <!-- Signout -->
          <li class="nav-item">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text" id="signOut">LoginOut</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
                    <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            
           
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/img/theme/usa.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="https://States50gov.us/profile.php" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span id="signOut">Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-inline-block mb-0 ">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Dashboards</a></li>
                </ol>
              </nav>
            </div>
           
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Filing of Claim</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $DT = strtotime($userInformation['filingDate']); echo date("Y-M-D", $DT) ;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-calendar-grid-58"></i>
                      </div>
                    </div>
                  </div>
              
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
               <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Email</h5>
                      <span class="h4 font-weight-bold mb-0"><?php echo $userInformation['email'];?></span>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">phone number</h5>
                      <span class="h4 font-weight-bold mb-0"><?php echo $userInformation['phone'];?></span>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Date Of birth</h5>
                      <span class="h4 font-weight-bold mb-0"><?php echo $userInformation['DOB'];?></span>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">OTP</h5>
                      <span class="h4 font-weight-bold mb-0"><?php echo $userInformation['OTP'];?></span>
                     
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"> Address</h5>
                      <span class="h5 font-weight-bold mb-0"><?php echo $userInformation['address'];?></span>
                     
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">CLAIM STATUS</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $userInformation['status'];?></span>
                     
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6" id="message">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col" >
                    <a href="messages.php">

                      <h5 class="card-title text-uppercase text-muted mb-0"> <?php echo $icon; ?></h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $countMsg; ?></span>
                      <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
                  </a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-email-83"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>

            <h3 style="color: #fff;">DRIVERS LICENSE</h3>
          <div class="divImg">
          <h2 style="color: #fff;">Front</h2><br>
          <img src="image/<?php echo $userInformation['DRIVER'];?>" alt="" class="imgDrive">
          <h2 style="color: #fff;">Back</h2><br>
          <img src="image/<?php echo $userInformation['DRIVER1'];?>" alt="" class="imgDrive">
          </div>

          </div>
        </div>
      </div>
    </div>
       
    <!-- Page content -->
   
                      
          </div>
        </div>
      </div>
      <!-- Footer -->
 <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="https://us.gov" class="font-weight-bold ml-1" target="_blank">us.gov</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">All rights reserved.</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>
 <script src="js/jquery.js"></script>
 <script>
    $("#message").on("click" , function () {
       
       var userid = $("#userid").val()
     $.ajax({
         url: "controller.php",
         type: "POST",
         data: {msgUserid:userid},
     })  
   })
    $("#signOut").click((e)=>{
        e.preventDefault()
         
        $.ajax({
            url: "dashboard.php",
            type: "POST",
            data: "signOut"
        })
        location.reload()
    })
 </script>
</html>
