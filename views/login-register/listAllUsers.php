<?php

require_once '../../model/Database.php';
require_once '../../model/User.php';
session_start();
$page_title = "Users";
if($_SESSION['username']=="admin"){
$db = Database::getDb();
$u = new User();
$users =  $u->getAllUsersExecptAdmin($db);

}else{
  header("Location: login.php");
}
include "../header.php"; 
?>




<div class="container" id="r_box">
  <h2 class="text-center">All Users</h2>
   <a href="../login-register/adminProfile.php" class="btn btn-primary" >Back To Your Profile</a> 
   <a href='../login-register/logout.php' class='btn btn-danger'>logout</a>          
  <table class="table table-hover">

  
    <thead>
      <tr>
      	<th>Sr. No.</th>
        <th>Name</th>
        <th>User Account Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
  	<?php	$count = 0;
    	foreach($users as $user){
        $userid = $user->id;
	  		$fullname = $user->fname . " " . $user->lname;
        $username = $user->username;
        $email = $user->email;
	  		++ $count;

 	 ?>
    <tbody>
      <tr>
      	<td><?= $count; ?></td>
        <td><a href="../login-register/userdetail.php?id=<?= $userid ?>"><?= $fullname; ?></a></td>
        <td><?= $username; ?></a></td>
        <td><?= $email; ?></a></td>
        <td >
        		<a href="userdetail.php?id=<?= $userid?>" class="btn btn-info" >Info</a>
        		<a href="deleteuser.php?id=<?= $userid?>" class="btn btn-danger">Delete</a>
     	</td>
      </tr>
   
    </tbody>

	<?php
		}
	?>
  </table>
</div>




<!-- Footer -->
<?php include "../footer.php"; ?>
