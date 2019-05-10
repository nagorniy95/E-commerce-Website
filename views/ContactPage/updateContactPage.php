<?php
require_once '../../model/Database.php';
require_once '../../model/ContactPage.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $dbcon = Database::getDb();
    $s = new ContactPage();
    $contact = $s->getContactPageById($id, $dbcon);
}
if(isset($_POST['updatecontact'])){
    $id= $_POST['cid'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
	$location = $_POST['location'];
    $dbcon = Database::getDb();
    $c = new ContactPage();
    $count = $c->updateContactPage($id, $email, $phone_number, $location, $dbcon);
    if($count){
        header("Location: addContactPage.php");
    } else {
        echo  "problem updating page";
    }
}
?>


<form action="" method="post">
    <input type="hidden" name="cid" value="<?= $contact->id; ?>" />
    E-mail: <input type="text" name="email" value="<?= $contact->email; ?>" /><br/>
    Phone Number: <input type="text" name="phone_number" value="<?= $contact->phone_number; ?>" /><br />
	Location: <input type="text" name="location" value="<?= $contact->location; ?>" /><br />
    <input type="submit" name="updatecontact" value="Update Contact">
</form>




