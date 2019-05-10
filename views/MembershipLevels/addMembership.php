<?php

session_start();
$page_title = "Add Membership Type";

//phpinfo();
require_once '../../model/Database.php';
require_once '../../model/membership.php';

include '../header.php';


$title = $price =  "";
$titleErr = $priceErr = "";



if(isset($_SESSION['id']))
{
	$client_id = $_SESSION['id'];
	$username = $_SESSION['username'];
	
	echo "Welcome" . " " .$username. "<br>";
	//echo $client_id;
	
	
	if (isset($_POST['title']))
		
	{	
		
		$title = $_POST['title'];	
		$price = $_POST['price'];
		
		//check if title is empty
		if (empty($title)){
			$titleErr = "Please enter Membership type<br />";
		
		}else {
			$titleErr = "";
	   }
	   if (empty($price)){
			$priceErr = "Please enter price<br />";
		
		}else {
			$priceErr = "";
	   }
	   
	  
		
		
			$db = Database::getDb();
			$m = new Member();
			
			$c = $m->addMember($title, $price, $db);
			
			if($c) {
				echo "Membership type added successfully";
			}else {
				echo "problem adding a membership";
			}
			
	}

}else{
	
	
	echo "<a href='../login-register/login.php'>Login</a>";
	 
	
	}

	
	
  
	
	
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div id="ak-membership_wrapper">

				<form action="" method = "post" id="ak_membershipform" name="ak_membership_form">
					</br></br>
					<h2> Add Membership Type</h2>
					
				Membership Level:<br/> <input type="text" class="ak_inputfield" name="title" value="<?= $title ?>" class="textbox"/>
									<span style="color:red;">
									<?= $titleErr; ?>
									</span>
									<br /><br />						
								
				Amount:<br/> <input type="text" class="ak_inputfield" name="price" value="<?= $price; ?>" class="textbox"/>
									<span style="color:red;">
									<?= $priceErr; ?>
									</span>
									<br /><br />							
					
					 <input type="submit" id="ak_membership_but" name="membership" value="Add Membership Level" class="btn btn-default">
					 <div id="ak_membership_message">
					 </div>
					 
				</form>		
			</div>
		</div>
	</div>
</div>





<?php include "../footer.php"; ?>
