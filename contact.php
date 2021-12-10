<?php
session_start([
    'cookie_lifetime' => 86400,
   ]);
if (!$_SESSION['workint']) {
   header("location: index.html");
} else {
   include("controller.php");
   $userid = $_SESSION['workint'];
   echo DB::query('SELECT email FROM users WHERE id = :id ' , array(':id'=>$userid))[0]['email'];
}
if (isset($_POST['signOut'])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>
       Contact US
   </h1>
   <input type="text" name="name" id="name" placeholder="Your name">
   <input type="email" name="email" id="email" placeholder="Your email">
   <input type="text" name="subject" id="subject">
   <textarea name="message" id="message" cols="30" rows="10" placeholder="message"></textarea>
   <button id="sndMsg">Send Message</button>
</body>
<script src="js/jquery.js"></script>
<script>
   $(document).ready(()=>{
       $("#sndMsg").click((e)=>{
           e.preventDefault()
        var name = $("#name").val()
        var email = $("#email").val()
        var subject = $("#subject").val()
        var message = $("#message").val()
    e.preventDefault()
    $.ajax({
         url : "form_control.php",
         type : "POST",
         data : {name:name , email:email , subject:subject , message:message }, 
         success : (data) => {
          alert(data)
         }
      })
    })
   }) 
</script>
</html>