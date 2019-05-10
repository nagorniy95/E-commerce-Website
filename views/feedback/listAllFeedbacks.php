<?php
//admin view


require_once '../../model/Database.php';
require_once '../../model/Feedback.php';
require_once '../../model/Product.php';
require_once '../../model/User.php';
session_start();
$page_title = "Feedbacks";
if($_SESSION['username']=="admin"){
$dbcon = Database::getDb();
$f = new Feedback();
$feedbacks =  $f->getAllFeedbacks($dbcon);

}else{
  header("Location: ../login-register/login.php");
}
include "../header.php"; 
?>



<div class="container" id="r_box">
  <h2 class="text-center">FeedBacks</h2>
   <a href="../login-register/adminProfile.php" class="btn btn-primary">Back To Your Profile</a>  
   <a href='../login-register/logout.php' class='btn btn-danger'>logout</a>         
  <table class="table table-hover">

  
    <thead>
      <tr>
      	<th>Sr. No.</th>
        <th>Title</th>
        <th>User Name</th>
        <th>Product Name</th>
        <th>Action</th>
      </tr>
    </thead>
  	<?php	$count = 0;
    	foreach($feedbacks as $feedback){
        $feedbackid = $feedback->id;
        $title = $feedback->title;
	  		$user_id = $feedback->user_id;
	  		$ud = new User();
	  		$user = $ud->getUserById($user_id, $dbcon);
	  		$username = $user->fname . " " . $user->lname;

	  		$product_id = $feedback->product_id;
	  		$p = new Product();
	  		$product = $p->getProductById($product_id, $dbcon);
	  		$productname = $product->name;
	  		++ $count;

 	 ?>
    <tbody>
      <tr>
      	<td><?= $count; ?></td>
        <td><a href="feedbackDetail.php?id=<?= $feedbackid ?>"><?= $title; ?></a></td>
        <td><a href="../login-register/userdetail.php?id=<?= $user_id ?>"><?= $username; ?></a></td>
        <td><a href="../CRUD-products/detailsProduct.php?id=<?= $product_id ?>"><?= $productname; ?></a></td>
        <td >
        		<a href="feedbackDetail.php?id=<?= $feedbackid?>" class="btn btn-info">Info</a>
        		<a href="deleteFeedback.php?id=<?= $feedbackid?>" class="btn btn-danger">Delete</a>
     	</td>
      </tr>
   
    </tbody>

	<?php
		}
	?>
  </table>
</div>


<!-- FOOTER -->
<?php include "../footer.php"; ?>