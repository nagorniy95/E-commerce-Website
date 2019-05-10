<?php
session_start();

$page_title = "Update Referal";
require_once '../../model/Database.php';
require_once '../../model/referal.php';

 include '../header.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $s = new Referal();
    $referal = $s->getReferalById($id, $dbcon);
   // var_dump($referal);

}

if(isset($_POST['ak_updref'])){
    $id= $_POST['ak_rid'];//not sure about the id
    $friend_name = $_POST['friend_name'];
    $friend_email = $_POST['friend_email'];
    $comment = $_POST['comment'];

    $dbcon = Database::getDb();
    $s = new Referal();
    $count = $s->updateReferal($id, $friend_name, $friend_email, $comment, $dbcon);

    if($count){
        header("Location: listReferals.php");
    } else {
        echo  "problem updating";
    }


}



?>
<div class="container">
    <br><br><br>
    <h2>Admin - Update Referal</h2> 			
	<form action="" method = "post">
		<input type="hidden" name="ak_rid" value="<?= $referal->id; ?>" /> 
		
		First Name:<br/> <input type="text" class="ak_inputfield" name="friend_name" value="<?= $referal->friend_name; ?>" /><br/>
					
		Email:<br/> <input type="text" class="ak_inputfield" name="friend_email" value="<?= $referal->friend_email; ?>" /><br /> 
								
		Comment:<br/> <input type="text" class="ak_inputfield" name="comment" value="<?= $referal->comment; ?>"/><br />
					
		<input type="submit" name="ak_updref" id="ak_updref_but" value="Update Referal" class="btn btn-default"></br></br>
	</form>		
	<p><a href="Listreferals.php">Back to List</a></p>	
</div>
<?php include "../footer.php"; ?>	

