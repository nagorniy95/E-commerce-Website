<!DOCTYPE html>

<?php
session_start();
$page_title = "Payment List";
require_once '../../model/Database.php';
require_once '../../model/payment.php';

 include '../header.php';

$dbcon = Database::getDb();
$s = new Payment();
$mypay =  $s->getAllPayments(Database::getDb());
?>

<main id="main_Payment_admin">
	
    <div class="container">
	<br><br><h2> Membership Payment List </h2>
        <div class="row">            
			<?php foreach($mypay as $payment){ ?>
			
			<div class="col-md-12 Payment">
	
			   <?php echo "<a href='paymentDetail.php?id=$payment->id'>" .  $payment->paymentdate  . "</a>".
					"<form action='updatePayment.php' method='post'>" .
					"<input type='hidden' value='$payment->id' name='id' />".
					"<input type='submit' value='Update' name='update' class='btn btn-default '/>".
					"</form>" .
					"<form action='deletePayment.php' method='post'>" .
					"<input type='hidden' value='$payment->id' name='id' />".
					"<input type='submit' value='Delete' name='delete' class='btn btn-default'/>".
					"</form>" . "<br><br>";					
				}
				?>
			</div>
		</div>			
	</div>	
</main>

<?php include "../footer.php"; ?>
















