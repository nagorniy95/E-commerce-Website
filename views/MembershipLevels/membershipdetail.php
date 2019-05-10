<?php
session_start();
$page_title = "Membership Types detail";

require_once '../../model/Database.php';
require_once '../../model/membership.php';
include '../header.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $s = new Member();
    $member = $s->getMemberById($id, $dbcon);

    //var_dump($student);

}
echo "<div class='container'>";
echo "<br><br><br><h2>Admin</h2>";
echo  "Membership Levels : " . $member->title. "<br ><br>";
echo  "Price : " . $member->price . "</br></br>";
?>
</br></br>
<p><a href="Listmembership.php">Back to List</a></p>
<?php
echo "</div>";
?>
