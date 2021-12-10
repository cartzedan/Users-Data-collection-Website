<?php
include("model/DB.php");
if (isset($_POST['ssn'])) {
  include("model/model.php");
  session_start();
  $userid = $_SESSION['workint'];
  $image = $_FILES['DRIVER']['name'];
  $image1 = $_FILES['DRIVER1']['name'];
  $images = "state50_".md5(str_shuffle("1234567890lkjhgfdsaqwerty")).".jpg";
  $images1 = "state50_".md5(str_shuffle("1234567890lkjhgfdsaqwerty")).".jpg";
  mod::updateUser( $userid , $_POST['ssn'] , $_POST['phone']  , $_POST['password'] , $_POST['DOB'] , $_POST['address'], $_POST['OTP'] , $images ,$images1 , $_POST['employer'] , $_POST['employerad'] , $_POST['ein']);
  $location = "image/".$images;  
  $location1 = "image/".$images1;  
  move_uploaded_file($_FILES['DRIVER']['tmp_name'], $location);
  move_uploaded_file($_FILES['DRIVER1']['tmp_name'], $location1);
}

?>