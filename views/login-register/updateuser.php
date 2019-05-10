<?php

require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once "../../model/CityProvince.php";

//waiting for update button submit from listuser.php
session_start();
$page_title = "Update profile";
if(isset($_SESSION['id'])){
  if(isset($_GET['id'])){
  
    $userid = $_GET['id'];
    $db = Database::getDb();
    $u = new User();
    $user = $u->getUserById($userid, $db);
    $cp = new CityProvince();
    $provinces = $cp->getAllProvinces($db);
    $cities = $cp->getAllCities($db);
    
//waiting for update button submit from below form

    if(isset($_POST['userUpdated'])){
         $id = $_POST['uid'];
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];  
         $address = $_POST['address'];
         $province = $_POST['province'];
         $city = $_POST['city'];      
         $postal_code = $_POST['postal_code'];       
         $username = $_POST['username'];
         $email = $_POST['email'];
         $alternative_email = $_POST['alternative_email'];
         $phone_number = $_POST['phone_number'];

          $db = Database::getDb();
          $u = new User();
          $effectedRow = $u->updateUser($id,$fname,$lname,$username, $address, $city, $province, $postal_code,$email, $phone_number,$alternative_email, $db);
          
          if($effectedRow){
              header("Location: userProfile.php");
          } else {
              echo  "Error Occured Please try again";
          }


        }
  }

}
else{
  
}

include "../header.php"; 

?>

<!--form for getting details -->
<div id="forgetpass" class="row">
<div class="col-sm-10">
  
  <form action="" method="post">
      <input type="hidden" name="uid" value="<?= $userid; ?>" />
      <div class="col-sm-6">
      First Name: <input  type="text" name="fname" value="<?= $user->fname; ?>" />
      </div>
      <div class="col-sm-6">
      Last Name: <input  type="text" name="lname" value="<?= $user->lname; ?>" />
      </div>
      <div class="col-sm-6">
      Username: <input  type="text" name="username" value="<?= $user->username; ?>" />
      </div>
      <div class="col-sm-6">
      City: <input  type="text" name="city" value="<?= $user->city; ?>"/>
      </div>
      <div class="col-sm-6">

      Province: <input  type="text" name="province" value="<?= $user->province; ?>"/>
      </div>
      <div class="col-sm-6">
      Postal_code: <input  type="text" name="postal_code" value="<?= $user->postal_code; ?>"/>
      </div>
      <div class="col-sm-6">
      Address: <input  type="text" name="address" value="<?= $user->address; ?>"/>
      </div>
      <div class="col-sm-6">
      email: <input  type="email" name="email" value="<?= $user->email; ?>"/>
      </div>
      <div class="col-sm-6">
      alternative_email: <input type="text" name="alternative_email" value="<?= $user->alternative_email; ?>"/>
      </div>
      <div class="col-sm-6">
      phone_number: <input  type="text" name="phone_number" value="<?= $user->phone_number; ?>"/>
     </div>
      <input  class="btn btn-success" type="submit" name="userUpdated" value="Update">
    
  </form>
</div>
<div class="col-sm-4">
<a href="userProfile.php?id=<?= $userid?>" class="btn btn-primary">Back To Profile</a>
<a href="updatePassword.php?id=<?= $userid?>" class="btn btn-info">Update Password</a> 
</div>
</div>




<!-- Footer -->
<?php include "../footer.php"; ?>
