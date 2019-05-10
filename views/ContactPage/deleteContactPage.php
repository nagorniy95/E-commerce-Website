<?php
require_once '../../model/Database.php';
require_once '../../model/ContactPage.php';

    if(isset($_POST['delete'])){
        $id= $_POST['id'];
        $dbcon = Database::getDb();
        $c = new ContactPage();
        $count = $c->deleteContactPage($id, $dbcon);
        if($count){
            header("Location: addContactPage.php");
        }
    }