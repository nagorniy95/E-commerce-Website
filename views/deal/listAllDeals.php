<?php
//admin view


require_once '../../model/Database.php';
require_once '../../model/Deal.php';
require_once '../../model/Product.php';
require_once '../../model/User.php';
session_start();
$page_title = "deals";
if($_SESSION['username']=="admin") {
$dbcon = Database::getDb();
$d = new Deal();
$deals =  $d->getAllDeals($dbcon);

}else{
  header("Location: ../login-register/login.php");
}
include "../header.php"; 
?>




<div class="container" id="r_box">
  <h2 class="text-center">Deals</h2>
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
    	foreach($deals as $deal){
        $dealid = $deal->id;
        $dealtitle = $deal->caption;
        $product_id = $deal->product_id;
        
        $p = new Product();
        $product = $p->getProductById($product_id, $dbcon);
        $productname = $product->name;


	  		$user_id = $product->user_id;
	  		$ud = new User();
	  		$user = $ud->getUserById($user_id, $dbcon);
	  		$username = $user->fname . " " . $user->lname;
	  		
	  		++ $count;

 	 ?>
    <tbody>
      <tr>
      	<td><?= $count; ?></td>
        <td><a href="dealDetail.php?id=<?= $dealid ?>"><?= $dealtitle; ?></a></td>
        <td><a href="../login-register/userdetail.php?id=<?= $user_id ?>"><?= $username; ?></a></td>
        <td><a href="../CRUD-products/detailsProduct.php?id=<?= $product_id ?>"><?= $productname; ?></a></td>
        <td >
        		<a href="dealDetail.php?id=<?= $dealid ?>" class="btn btn-info">Info</a>
        		<a href="deleteDeal.php?id=<?= $dealid?>" class="btn btn-danger">Delete</a>
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