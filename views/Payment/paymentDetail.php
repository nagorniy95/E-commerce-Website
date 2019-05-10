<?php
session_start();

$page_title = "Payment Detail";

require_once '../../model/Database.php';
require_once '../../model/payment.php';

 include '../header.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $s = new Payment();
    $payment = $s->getPaymentById($id, $dbcon);
	

   // var_dump($payment);

}
echo "<div class='container'>";
echo "<br><br><br><h2>Admin</h2>";
echo  "Payment Date: " . $payment->paymentdate . "<br />";
echo  "amountpaid : " . $payment->amountpaid . "<br />";
echo  "membership id : " . $payment->membership_id . "<br />";
echo  "client id : " . $payment->client_id . "<br />";
?>

</br></br>
<p><a href="Listpayments.php">Back to List</a></p>

<?php
echo "</div>";
?>
				
 
