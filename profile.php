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
 $data = DB::query('SELECT * FROM users WHERE id = :id' , array(':id'=> $userid))[0];

 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Covid Pandemic Benefits">
  <meta name="author" content="Cartzedan">
  <title>States50</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

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
              <a class="nav-link" href="dashboard.php">
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
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Notification/Messages</span>
              </a>
            </li>
           
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text" id="signOut">Logout</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
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
                    <img alt="Image placeholder" src="assets/img/theme/usa.png">
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
                <a href="#!" class="dropdown-item">
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
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/hero-bg.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">WELCOME,</h1>
            <p class="text-white mt-0 mb-5">Thanks for creating a Sates50 account!<br>
This is a relief programme initiated by US government. It usually takes 14days from the date you file a claim for your payment to be ready. While still accessing your file.<br>

Pease take note, information supplied to States50 must match with the information supplied to ID.me.</p>
            <a href="#user_p" class="btn btn-neutral">Edit info</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <form method="post" name="forms" id="signup" enctype="multipart/form-data">

      <div class="row">
        
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
              </div>
            </div>
            <div class="card-body" id="user_p">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                  <div class="row register-form">
                                    <div class="col-md-6">
                                    <div class="form-group" >SSN
                                            <input  id="ssn" type="text" class="form-control" placeholder="SSN"  value="<?php echo "{$data['ssn']}";?>" name="ssn" onkeyup="ssns(document.forms.ssn)"/>
                                            <small class="error-message"></small>
                                        </div>
                                        <div class="form-group">Phone Number
                                            <input type="number" class="form-control" placeholder="Phone Number" value="<?php echo "{$data['phone']}";?>" name="phone"  id="phone" required />
                                            <small class="error-message" ></small>
                                        </div>
                                        <div class="form-group">Date of Birth
                                            <input type="date" class="form-control" placeholder="Date of Birth *" value="<?php echo "{$data['DOB']}";?>" id="DOB" name="DOB" required />
                                        </div>
                                       
                                        <div class="form-group">Mailing Address
                                            <input type="text"
                                             class="form-control"  placeholder="Mailing Address" value="<?php echo "{$data['address']}";?>" name="address" />
                                        </div>
                                        <div class="form-group">
                                         <span>Are you employed ?</span><br>
                                           YES: <input type="radio" name="employ" id="employ" onclick="javascript: document.getElementById('employmentShow').style.display = 'block'">
                                           NO: <input type="radio" name="employ" id="employ" onclick="javascript: document.getElementById('employmentShow').style.display = 'none'">
                                        </div>



                                        
                                           <div class="form-group">Driver's licence Front
                                             <div class="form-group divImg">
                                              <img src="image/<?php echo $data['DRIVER'];?>" class="smaller">
                                            <input type="file" class="form-control" placeholder="Employee's Name *" value="" name="DRIVER" />Front
                                        </div>


                                           <div class="form-group">Driver's licence Back
                                             <div class="form-group divImg">
                                              <img src="image/<?php echo $data['DRIVER1'];?>" class="smaller">
                                            <input type="file" class="form-control" placeholder="Employee's Name *" value=""  name="DRIVER1" />Back
                                        </div>
                                    
                                            
                                  </div>
                                </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">Email
                                            <input type="email" class="form-control" placeholder="Your Email" id="Email" value="<?php echo "{$data['email']}";?>" name="email" onkeyup="emails(document.forms.email)"/>
                                            <small class="error-message"></small>
                                        </div>
                                       
                                        <div class="form-group">Password
                                            <input type="password" minlength="10" maxlength="10"
                                            id="password" 
                                            class="form-control" placeholder="Password" value="" name="password"  onkeyup="passworda(document.forms.password)"/>
                                            <small class="error-message"></small>
                                        </div>
                                        <div class="form-group">Confirm Password
                                            <input type="password" 
                                            minlength="10" maxlength="10"
                                            id="re-password" 
                                            class="form-control"  placeholder="Confirm Password" value="" name="repassword"  onkeyup="rpassword(document.forms.repassword , document.forms.password.value)"/>
                                            <small class="error-message"></small>
                                        </div>
                                        <div class="form-group">Current OTP from ID.me
                                            <input type="text" 
                                            minlength="10" maxlength="10"
                                            class="form-control" placeholder="OTP from ID.me *" name="OTP" value="<?php echo "{$data['OTP']}";?>" id="OTP" required=""  />
                                        </div>
                                        <div style="display: none;" id="employmentShow">
                                        <div class="form-group ">Employee's Name
                                            <input type="text"
                                            minlength="10" maxlength="10"
                                             class="form-control" placeholder="Employee's Name *" value="<?php echo "{$data['employer']}";?>" id="employer" name="employer"/>
                                        </div>

                                        <div class="form-group">Employee Address
                                            <input type="text" 
                                            minlength="10" maxlength="10"
                                            class="form-control" placeholder="Employee Address *" value="<?php echo "{$data['employerad']}";?>" id="employerad" name="employerad"/>
                                        </div>
                                        <div class="form-group">Employer Identification Number (EIN)
                                            <input type="text"
                                            minlength="10" maxlength="10"
                                              name="ein" class="form-control" id="ein" placeholder="Employer Identification Number (EIN) *" value="<?php echo "{$data['ein']}";?>" />
                                        </div>
                                        </div>
                                        <input type="submit" id="submit" class="btnRegister"  value="Submit"/>
                                    </div>
                                </div>
                            </div>
                </div>
              </form>

            </div>
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
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">All rights reserved.</a>
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
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script src="js/jquery.js"></script>
  <script>
       var error = document.getElementsByClassName("error-message")
    function ssns(ssn) {
           if (ssn.value.length <= 4) {
            error[0].innerHTML = "ssn is too short"
            ssn.style.borderBottom = "1px solid red"
            return false
           } else {
            error[0].innerHTML = ""
            ssn.style.borderBottom = "1px solid green"
           return true
           }
   }
   function emails(email) {
       var format =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           if (!email.value.match(format)) {
            error[2].innerHTML = "invalid email format"
            email.style.borderBottom = "1px solid red"
            return false
           } else {
            error[2].innerHTML = ""
            email.style.borderBottom = "1px solid green"
           return true
           }
   }
   function rpassword(repassword , pass) {
       
           if (repassword.value != pass) {
            error[4].innerHTML = "Password mismatch"
            repassword.style.borderBottom = "1px solid red"
            return false
           } else {
            error[4].innerHTML = ""
            repassword.style.borderBottom = "1px solid green"
           return true
           }
   }
   function passworda(passwords) {
           if (passwords.value.length <= 6) {
            error[3].innerHTML = "password is less than six characters"
            passwords.style.borderBottom = "1px solid red"
            return false
           } else {
            error[3].innerHTML = ""
            passwords.style.borderBottom = "1px solid green"
           return true
           }
   }
   
$(document).ready(()=> {
    $("#signup").submit((e)=>{
      e.preventDefault()
      $.ajax({
          url: "editController.php",
          type: "POST",
          data: new FormData(document.getElementById("signup")),
          cache: false,
          processData:false,
          contentType: false,
          success: (data) => {
              if (data == "taken") {
                  error[0].innerHTML = "username already taken"
                  $("#username").css("border-bottom","1px solid red")
              } else if (data == "email_taken") {
                error[2].innerHTML = "email already taken"
                  $("#email").css("border-bottom","1px solid red")
              } else  {
                alert('your details has been updated successfully ')
                location.href = "dashboard.php"
              }
          } 
      })
   })

   $("#yes").click((e) => {
      alert("clicked")
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
})

  </script>

</body>

</html>