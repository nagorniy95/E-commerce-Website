<?php
require_once '../../model/Database.php';
require_once '../../model/User.php';
session_start();
//waiting for delete button submit

if(isset($_SESSION['id'])){

    $id = $_GET['id'];
    $db = Database::getDb();
    $u = new User();
    $effectedRow = $u->deleteUser($id, $db);
   	if($effectedRow){
			if($_SESSION['username']=="admin"){
				header("Location: listAllUsers.php");
			}else{
				header("Location: ../login-register/login.php");
			}
	       
	    }
   
}else{
  header("Location: ../login-register/login.php");

}
//include "../header.php"; 
