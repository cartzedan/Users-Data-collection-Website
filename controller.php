<?php
include("model/DB.php");
if (isset($_POST['ssn'])) {
  include("model/model.php");
  $image = $_FILES['DRIVER']['name'];
  $image1 = $_FILES['DRIVER1']['name'];
  $images = "state50_".md5(str_shuffle("1234567890lkjhgfdsaqwerty")).".jpg";
  $images1 = "state50_".md5(str_shuffle("1234567890lkjhgfdsaqwerty")).".jpg";
  mod::CreatUser($_POST['ssn'] , $_POST['phone'] , $_POST['email'] , $_POST['password'] , $_POST['DOB'] , $_POST['address'], $_POST['OTP'] , $images ,$images1 , $_POST['employer'] , $_POST['employerad'] , $_POST['ein']);
  $location = "image/".$images;  
  $location1 = "image/".$images1;  
  move_uploaded_file($_FILES['DRIVER']['tmp_name'], $location);
  move_uploaded_file($_FILES['DRIVER1']['tmp_name'], $location1);
}


if (isset($_POST['login_email'])) {
   include("model/model.php");
   if (DB::query('SELECT email FROM users WHERE email = :email ', array(':email' =>$_POST['login_email']))) {
     if (password_verify($_POST['login_password'] , DB::query('SELECT password FROM users WHERE email = :email ', array(':email' =>$_POST['login_email']))[0]['password'])) {
      $req = DB::query('SELECT id FROM users WHERE email = :email' , array(':email' =>$_POST['login_email']))[0]['id'];
      session_start();
      $_SESSION['workint'] = $req;
      $_SESSION['logged_in'] = true;
      echo "true"; 
     } else {
       echo "invalid";
     }
   } else {
     echo "not_exist";
   }
}

if (isset($_POST['eMails'])) {
    session_start();
    $userid = $_SESSION['workint'];
    DB::query('UPDATE users SET email = :email , phone = :phone , DOB = :DOB , OTP = :OTP WHERE id = :id' , array(':id'=>$userid , ':email' => $_POST['eMails'] , ':phone' => $_POST['ePhone'] , ':DOB' => $_POST['eDOB'] , ':OTP' => $_POST['eOTP']));
   echo 'true';
}

if (isset($_POST['msgUserid'])) {
    $userid = $_POST['msgUserid'];
    DB::query('UPDATE messages SET status = "true" WHERE userid = :userid' , array(':userid' => $userid));
    echo "true";
}
?>