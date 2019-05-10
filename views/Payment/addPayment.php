<?php
session_start();
$page_title = "Become a member";
include '../header.php';

require_once '../../model/Database.php';
require_once '../../model/membership.php';
require_once '../../model/payment.php';





if(isset($_SESSION['id']))
{
	$client_id = $_SESSION['id'];
	$username = $_SESSION['username'];
	echo "Welcome" . " " .$username. "<br>";
	//echo $client_id;
	

	
	
	
	
	






//get membership data from database
$dbcon = Database::getDb();
$s = new Member();
$mymember =  $s->getAllMembers(Database::getDb());

?>
</br></br>


<div class="container">
<h1> Sign up for Membership </h1>
<div class="row">

<?php

	foreach($mymember as $member){?>
	<form class="col-md-4" action="paypal/checkout.php" method = "POST" id="ak_memberform" name="ak_member_form">    
		

	
			</br></br>
            <div class="panel panel-primary">
						
                <!--<div class="panel-heading">-->
				<div class="payment-heading">
                    <h4 class="text-center">
					
                        <?php echo "$member->title"?><br><br>
						
					 </h4>
                <!--</div>
                <div class="panel-body text-center">-->
                    <p class="text-center">
                        <?php echo "$member->price". " " . "/MONTH"?> 
					</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "$member->benefitdesc1"?> </li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "$member->benefitdesc2"?></li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "$member->benefitdesc3"?></li>
                </ul>
                <div class="panel-footer"></div>
			

			
		</div>


<input type="hidden" name="id" value='<?php echo $client_id;?>' />
<input type="hidden" name="title" value='<?php echo $member->title;?>' />
<input type="hidden" name="price" value='<?php echo $member->price;?>' />

 <input name="submitmsg" type="submit" id="submitmsg" value="Send" class="btn btn-default" />
 </form>



<?php
}
?>
</div>
</div>
<p class="text-center">
You'll be taken to Paypal to complete your payment.
</p>
<?php
}else{
	echo "</br></br></br></br>";
	echo "<p> login before sign up for membership </p>";
	
	 
	
	}
?>


<?php include "../footer.php"; ?>