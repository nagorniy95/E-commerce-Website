
<!--
Author:    Rohit Arora; n01269796;
Feature:   Login after Registeration --> 
<?php

require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once "function.php";
require 'phpmailer/PHPMailerAutoload.php';
session_start();
$page_title = "forget Password";
$msg ="";
$emailerr = "";
if(isset($_POST['submit']))
		{

		$db = Database::getDb();
		$email = $_POST['email'];
		$valid = validateForgetPassword($emailerr,$email,$db);
    echo $valid;		
		if($valid){
  			$u = new User();
  			$user = $u->getUserByEmail($email,$db);
        $username = $user->username;
        $pass = $user->password;
        $mail = new PHPMailer();
        $mail->isSMTP();
    //$mail->SMTPDebug = 1; //2 for development, shows detailed message
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = "tls";

      $mail->Username = "wdn01269796@gmail.com";
      $mail->Password = "mailtest1234";
     
     
      $mail->setFrom('wdn01269796@gmail.com', 'admin');
      $mail->addAddress($email, $username);
     // $mail->addReplyTo('anupamsreejayan12312312@gmail.com', '');
     
      $mail->isHTML(true);
       $mail->Subject = 'Foget Username and Password';
      $mail->Body = "hello <br/>"."Your username is : ".$username."<br/>Your password is : ".$pass;
      $mail->send();
      if($mail->send()){

        $msg = "Your credentials has been sent to your mail";
      }

    }




	
	}
include "../header.php";

?>
<div id="forgetpass">
      <h2 class="text-center">Forget Password</h2>
      <form class="form-horizontal" method="POST">
        <div class="form-group">
          <label class="control-label col-sm-2" for="opass">Enter your Email:</label>
          <div class="col-sm-4">
            <input type="Email" class="form-control" id="email" placeholder="Enter your email" name="email"/>
            <span style="color: red"> <?= $emailerr;?></span>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <a class="btn btn-primary" href="login.php">Login</a>
          </div>
        </div>
      </form>
    </div>
   <h3 class="text-center"> <?=$msg; ?></h3>


   

<!-- Footer -->
<?php include "../footer.php"; ?>