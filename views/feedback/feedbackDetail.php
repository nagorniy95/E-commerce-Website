<?php

//admin  view


require_once '../../model/Database.php';
require_once '../../model/Feedback.php';
require_once '../../model/Product.php';
require_once '../../model/User.php';


session_start();
$page_title = "Feedback detail";

if($_SESSION['username'] == "admin") {

	if(isset($_GET['id'])) {
	$feedbackid = $_GET['id'];
	$dbcon = Database::getDb();
	$f = new Feedback();
	$feedback =  $f->getFeedbackById($feedbackid ,$dbcon);
	$title = $feedback->title;
	$message = $feedback->message;

	$product_id = $feedback->product_id;
	$p = new Product();
	//$product = $p->getProductById($product_id, $dbcon);
	$productname = $product->name;

	$user_id = $feedback->user_id;
	$ud = new User();
	$user = $ud->getUserById($user_id, $dbcon);
	$username = $user->fname . " " . $user->lname;

	}
	
}else{
  header("Location: ../login-register/login.php");
}
include "../header.php"; 
?>



<div class="container" id="r_box">
  <div class="jumbotron">
    <a href='../login-register/logout.php' class='btn btn-danger'>logout</a> 
  	<h2 class="text-center"><?= $title ;?></h2>
     
    <p><?= "Message  : " . $message ."<br/>";?></p>
    <p>
    	<a href="detailsProduct.php?id=<?= $product_id ?>"><?= "product name  : " . $productname ."<br/>";?></a>
    </p>
    <p>
    	<a href="userDetail.php?id=<?= $user_id ?>"><?= "user name  : " . $username ."<br/>";?></a>
    </p>
  </div>
   
  <a href="listAllFeedbacks.php" class="btn btn-primary">Back To Feedbacks List</a>
  <a href="deleteFeedback.php?id=<?= $feedbackid?>" class="btn btn-danger">Delete</a>    
</div>


<!-- FOOTER -->
<?php include "../footer.php"; ?>

