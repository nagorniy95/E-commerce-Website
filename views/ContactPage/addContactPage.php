<?php
require_once '../../model/Database.php';
require_once '../../model/ContactPage.php';

    if(isset($_POST['addinfo'])){
        $email = $_POST['email'];
        $number = $_POST['number'];
		$location = $_POST['location'];
        
        $db = Database::getDb();
        $c = new ContactPage();
        $my_data = $c->addContactPage($email, $number, $location, $db);
		
		echo "<h5>Form submitted!!!</h5>";
        
    }
?>

<h2>We would like to hear from you!!!</h2>
<form action="" method="post">
    <label for="contact_page_email">E-mail:</label>
    <input type="text" name="email" id="contact_form_email" /><br />
    <label for="contact_page_number">Phone Number:</label>
    <input type="text" name="number" id="contact_form_number" /><br />
	 <label for="contact_page_location">Location:</label>
    <input type="text" name="location" id="contact_form_location" /><br />
    <input type="submit" name="addinfo" value="Submit Details" />
</form>
