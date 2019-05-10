<?php
require_once '../../model/Database.php';
require_once '../../model/ContactPage.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();
    $c = new ContactPage();
    $contact = $c->getContactPageById($id, $dbcon);
}
echo  "E-mail: " . $contact->email . "<br />";
echo  "Location: " . $contact->location . "<br />";
echo  "Phone: " . $contact->phone_number . "<br />";

