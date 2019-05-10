<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/payment.php';

 
if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $s = new Payment();
    $count = $s->deletePayment($id, $dbcon);

    if($count){
        header("Location: listPayments.php");
    }
}
?>
<?php include "../footer.php"; ?>