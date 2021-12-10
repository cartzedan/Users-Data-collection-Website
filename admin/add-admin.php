<?php
 session_start([
     'cookie_lifetime' => 86400,
    ]);
 if (!$_SESSION['admin_workint']) {
    header("location: index.html");
 } else {
    include("controller.php");
    $userid = $_SESSION['admin_workint'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

 <title>States50</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
  </div>

 

  
        

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
  
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
        </ol>
        <h2>Add a new Admin</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

             <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="" method="" class="row g-3">
                        <h4>Add new admin</h4>
                        <div class="col-12">
                            <label>Admin: Username</label>
                            <input type="text" placeholder="Username" id="username" class="form-control" required> <br>
                            <small class="error-message"></small></div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" placeholder="Password " id="password" class="form-control" required> <br>
                            <small class="error-message"></small></div>
                            <br><br><br>
                            <select name="select_" id="select_" class="form-control">
                            <option value="pro">professional</option>
                            <option value="sur">super admin</option>
                            </select>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit"  class="btn btn-dark float-end" id="submit">Add this admin</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    
                </div>
            </div>
        </div>
    </div>

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Who we are</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Before You get Started</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Check Claim Status</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Rights to Know</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Report fraud</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-info">
              <a href=index.html" class="foot-logo"><img src="assets/img/us.png" alt="" class="img-fluid"></a>

              <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; 2021 <strong><span><a href="https://us.gov">us.gov</a></span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../js/jquery.js"></script>
  <script>
  var error = document.getElementsByClassName("error-message")
   $(document).ready(() => {
       $("#submit").click( (e) => {
           e.preventDefault()
           var username = $("#username").val()
           var password = $("#password").val()
           var selects = $("#select_").val()           
           $.ajax({
               url : "controller.php",
               type: "POST",
               data: { "admind_username" :username , "admind_password" : password , "admin_select" : selects}  ,
               error: () => {
                   alert("there was an error connecting to the internet")
               },
               success: (data) => {
                if (data == "already_exist") {
                    error[0].innerHTML = "username has been registered with another admin"
                  $("#username").css("border-bottom","1px solid red")  
                } else if (data == "true")      
                 {
                     alert("admin added successfully")
                  location.href = "dashboard.php"  
                }
               }
           })
       })

   })
 </script>
 
</body>

</html>