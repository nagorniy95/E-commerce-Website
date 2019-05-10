<?php
session_start();

$page_title = "Details Referal";
require_once '../../model/Database.php';
require_once '../../model/referal.php';

 include '../header.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $s = new Referal();
    $referal = $s->getReferalById($id, $dbcon);
	

   // var_dump($referal);

}

echo "<br/></br></br></br>";
echo "<div class='container'>";
echo  "Name : " . $referal->friend_name . "<br />";
echo  "Email : " . $referal->friend_email . "<br />";
echo  "Comment : " . $referal->comment . "<br />";
echo  "Date : " . $referal->referal_date . "<br />";
?>

</br></br>
<p><a href="Listreferals.php">Back to List</a></p>

<?php
echo "</div>";
?>

 
