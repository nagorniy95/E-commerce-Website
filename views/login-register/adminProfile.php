<?php
session_start();
$page_title = "admin profile";
if($_SESSION['username'] == "admin"){
   
}else{
  header("Location: login.php");
}

require_once '../headeradmin.php';
?>

<div class="container">
	<h2 align="center">Admin Profile</h2>
	<a align="center" href="../index.php"><h3>Home Page</h3></a><br/><br/>
	<div class="row">
		<a class="col-md-4 " href='../SearchCategory/listcategoriesAdmin.php'>Search Categories</a><br/>
		<a class="col-md-4 " href='../deal/listAllDeals.php'>List of deals </a><br/>
		<a class="col-md-4 " href='listAllUsers.php'>List of users</a><br/>
		<a class="col-md-4 " href='../feedback/listAllFeedbacks.php'>List of feedbacks</a><br/>
		<a class="col-md-4 " href="../Alerts/addAlert.php">Alert</a><br/>
		<a class="col-md-4 " href='../referal/listReferals.php'>List of Referals</a><br>
		<a class="col-md-4 " href='../MembershipLevels/addmeMbership.php'>Add Membership Types</a><br>
		<a class="col-md-4 " href='../MembershipLevels/listMembership.php'>List Membership Types</a><br>
		<a class="col-md-4 " href='../Payment/listPayments.php'>List Membership payments</a><br>
		<a class="col-md-4 " href='../faq/addFaq.php'>Add FAQ</a><br>
		<a class="col-md-4 " href='../faq/listfaqs.php'>List FAQ</a><br>
		<a class="col-md-4 " href='../contactForm/listContactForm.php'>List Contact Forms</a><br>
		<a class="col-md-4 " href='../CRUD-products/newProduct.php'>Add Products</a><br><br/>
		<a class="col-md-4 " href='../CRUD-products/listProducts.php'>List Products</a><br>
		<a class="col-md-4 " href='logout.php' class='btn btn-danger'>Logout</a><br/>
	</div>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php
require_once '../adminfooter.php';

