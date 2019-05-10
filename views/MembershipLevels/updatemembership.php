<?php
session_start();

$page_title = "Update Membership Types";

require_once '../../model/database.php';
require_once '../../model/membership.php';

include '../header.php';
if(isset($_POST['update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $m = new Member();
    $member = $m->getMemberById($id, $dbcon);
    //var_dump($member);

}


if(isset($_POST['updateM'])){
    $id= $_POST['memberid'];
	$title = $_POST['title'];
   	$price = $_POST['price'];
	

    $db = Database::getDb();
    $m = new Member();
    $count = $m->updateMember($id, $title, $price, $db);

    if($count){
        header("Location: listmembership.php");
    } else {
        echo  "problem updating";
    }


}

?>
<div class="container">
    <br><br><br>
    <h2>Admin - Update Membership Types</h2>    
	<form action="" method = "post">
		<input type="hidden" name="memberid" value="<?= $member->id; ?>" />
		Level Description:<br/>	<input type="text" class="inputfield" name="title" value="<?= $member->title; ?>" /></br>
							
		Price:<br/> <input type="text" class="inputfield" name="price" value="<?= $member->price; ?>" /></br>
		
			
		 <input type="submit" name="updateM" value="Update Membership types" class="btn btn-default"></br></br></br></br>

	</form>
	<p><a href="Listmembership.php">Back to List</a></p>
</div>


<?php include "../footer.php"; ?>