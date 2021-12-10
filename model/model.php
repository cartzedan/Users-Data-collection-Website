<?php

class mod
{
  public static function CreatUser ($ssn , $phone , $email , $password , $DOB , $address , $OTP , $DRIVER, $DRIVER1 , $employer = "" , $employerad = "" , $ein = "") {
    if (!DB::query('SELECT ssn FROM users WHERE ssn = :ssn ', array(':ssn' => $ssn))) {
        if (!DB::query('SELECT email FROM users WHERE email = :email ', array(':email' => $email))) {
           DB::query('INSERT INTO users VALUES(\'\' , :ssn , :email , :phone ,:DOB , :address , :DRIVER , :DRIVER1 , :password , :OTP , :employer , :employerad , :ein , NOW() , \'processing\')' , array(':ssn'=>$ssn , ':email'=>$email , ':phone'=>$phone , ':password'=>password_hash($password, PASSWORD_BCRYPT) , ':DOB' => $DOB ,':address'=>$address, ':OTP' => $OTP , ':DRIVER'=>$DRIVER , ':DRIVER1' => $DRIVER1 , ':employer'=>$employer  , ':employerad'=>$employerad , ':ein'=>$ein));
 
    $req = DB::query('SELECT id FROM users WHERE ssn = :ssn' , array(':ssn' => $ssn))[0]['id'];
    session_start();
    $_SESSION['workint'] = $req;
    $_SESSION['logged_in'] = true;
    echo "true";
        } else{
            echo "email_taken";
        }
    } else {
        echo "taken"; 
  }  
}


public static function updateUser ( $id , $ssn , $phone , $email , $password , $DOB , $address , $OTP , $DRIVER, $DRIVER1 , $employer = "" , $employerad = "" , $ein = "") {
      if (!DB::query('SELECT email FROM users WHERE email = :email ', array(':email' => $email))) {
         DB::query('UPDATE  users SET ssn = :ssn , email= :email , phone = :phone , DOB = :DOB , address = :address ,DRIVER = :DRIVER ,DRIVER1 = :DRIVER1 ,password = :password , OTP = :OTP , employer = :employer , employerad = :employerad ,ein = :ein WHERE id = :id' , array( ':id'=>$id , ':ssn'=>$ssn , ':email'=>$email , ':phone'=>$phone , ':password'=>password_hash($password, PASSWORD_BCRYPT) , ':DOB' => $DOB ,':address'=>$address, ':OTP' => $OTP , ':DRIVER'=>$DRIVER , ':DRIVER1' => $DRIVER1 , ':employer'=>$employer  , ':employerad'=>$employerad , ':ein'=>$ein));
      echo "true";
      } else{
          echo "email_taken";
      }
 
}

}

?>