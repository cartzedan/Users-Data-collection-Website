<?php


  include("../model/DB.php");

  if (isset($_POST['admin_username'])) {
      if (DB::query('SELECT username FROM admin WHERE username = :username ', array(':username' =>$_POST['admin_username']))) {
      if (password_verify($_POST['admin_password'] , DB::query('SELECT password FROM admin WHERE username = :username ', array(':username' =>$_POST['admin_username']))[0]['password'])) {
       $req = DB::query('SELECT id FROM admin WHERE username = :username' , array(':username' =>$_POST['admin_username']))[0]['id'];
       session_start();
       $_SESSION['admin_workint'] = $req;
       $_SESSION['logged_in'] = true;
       echo "true"; 
      } else {
        echo "invalid";
      }
    } else {
      echo "not_exist";
    }
  }

  if (isset($_POST['admind_username'])) {
    session_start();
    $userid = $_SESSION['admin_workint'];
    $username = DB::query('SELECT username FROM admin WHERE id = :id' , array(':id'=>$userid))[0]['username'];
    if (!DB::query('SELECT username FROM admin WHERE username = :username ', array(':username' =>$_POST['admind_username']))) {
      DB::query('INSERT INTO admin VALUES(\'\' , :username , :password , :type , :added_by)' , array(':username'=>$_POST['admind_username']  , ':password'=>password_hash($_POST['admind_password'], PASSWORD_BCRYPT), ':type'=>$_POST['admin_select'], ':added_by'=>$username));   
      echo "true"; 
   } else {
    echo "already_exist";
  }
}
if (isset($_POST['userIDs'])) {
  $userid = $_POST['userIDs'];
  $status = DB::query('SELECT status FROM users WHERE id = :id' , array(':id'=>$userid))[0]['status'];
  switch ($status) {
    case 'processing':
      DB::query('UPDATE users SET status = "confirmed" WHERE id = :id' , array(':id'=>$userid));
      echo "confirmed";
      break;

      case 'confirmed':
      DB::query('UPDATE users SET status = "denied" WHERE id = :id' , array(':id'=>$userid));
      echo "denied";
      break;
    
    default:
    DB::query('UPDATE users SET status = "processing" WHERE id = :id' , array(':id'=>$userid));
    echo "processing";
      break;
  }
 
}
if (isset($_POST['userid'])) {
  session_start();
  $adminId = $_SESSION['admin_workint'];
  $userid = $_POST['userid'];
  $title = $_POST['title'];
  $message = $_POST['message'];

  DB::query('INSERT INTO messages VALUES(\'\' , :userid ,  :adminId , :title , :message ,\'false\')' , array(':userid'=> $userid ,':title'=>$title , ':message'=>$message ,':adminId'=>$adminId));
  echo "true";
}

?>