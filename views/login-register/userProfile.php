<?php
 
require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once '../../model/Product.php';
require_once '../../model/Deal.php';

//waiting for getting id of user when click a user in  listuser.php
session_start();
$page_title = "Profile";
if(isset($_SESSION['id'])){
        $userid = $_SESSION['id'];
        $db = Database::getDb();
        $u = new User();
        $user = $u->getUserById($userid, $db);
        $fullname = $user->fname . " " . $user->lname;
        $username = $user->username;
        $email = $user->email;
        $address = $user->address;
        $city = $user->city;
        $province = $user->province;
        $postal_code = $user->postal_code;
        $alternative_email = $user->alternative_email;
        $phone_number = $user->phone_number;

        //product of users
        $products =  $u->getAllProductsByUserId($userid,$db);
}else{
  header("Location: login.php");
}
include "../header.php";
?>

 

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <div class="container">
      <div class="jumbotron" id="r_box">
        <div class="row">
        <div class="col-sm-9">
          <h2><?= "Welcome  : " . $fullname . "<br/>";?></h1>
        </div>
        <div class="col-sm-2">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $username ?> 
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li>
                <a href="updateuser.php?id=<?= $userid?>">Update Profile</a>
              </li>
              <li>
                <a href="membership.php">Update Membership</a>
              </li>
              <li>
                <a href="updatePassword.php?id=<?= $userid?>">Update Password</a> 
              </li>
              <li class="divider"></li>
              <li>
                <a href="logout.php?id=<?= $userid?>">Log Out</a> 
              </li>
            </ul>
          </div>
        </div>
      </div>
        <p><?= "Username  : " . $username ."<br/>";?></p>
        <p><?= "email  : " . $email ."<br/>";?></p>
        <p><?= "address  : " . $address ." , ".$city." , ".$province." , ".$postal_code ."<br/>";?></p>
        <p><?= "phone number  : " . $phone_number ."<br/>";?></p>
    
      </div>

     
    

<!--       displaying list of products -->
      <div class="col-sm-5">
          <a href="../CRUD-products/newProduct.php" class="btn btn-primary">Add New Product</a> 
          <h2>Products Of <?= $fullname?> </h2>           
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Product Name</th>
                <th>Categories</th>
                <th>Action</th>
              </tr>
            </thead>
            <?  
              $count = 0;
              foreach($products as $product){
                $productid = $product->id;
                $productname = $product->name;
                $category = $product->title;
                ++ $count;
           ?>
            <tbody>
              <tr>
                <td><?= $count; ?></td>
                <td><a href="../CRUD-products/detailsProduct.php?id=<?= $productid ?>"><?= $productname; ?></a></td>
                <td><?= $category; ?></td>
                <td ><a href="../CRUD-products/detailsProduct.php?id=<?= $productid?>" class="btn btn-info">Info</a></td>
              </tr>
            </tbody>
          <?
            }
          ?>
          </table>
        </div>


  <!--       displaying list of deals -->
        <div class="col-sm-7">
          <a href="../deal/addDeal.php" class="btn btn-primary">Add New deal</a> 
          <h2>Deal for a product for user profile view</h2>            
          <table class="table table-hover">
            <thead>
              <tr>
                
                <th>Title</th>
                <th>Product Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Action</th>
              </tr>
            </thead>
            <?
            foreach($products as $product){
                $product_id = $product->id;
                $productname = $product->name;
                //deals of user per product
                $d = new Deal();
                $deals =  $d->getDealByProductId($product_id,$db);
                
            foreach($deals as $deal){
              $dealid = $deal->id;
              $caption = $deal->caption;
              
              $start_date = $deal->start_date;
              $st = strtotime($start_date);
              $start_date = date('d-m-Y',$st);

              $end_date = $deal->end_date;
              $et = strtotime($end_date);
              $end_date = date('d-m-Y',$et);

           ?>
            <tbody>
              <tr>
                <td><a href="../deal/dealDetail.php?id=<?= $dealid; ?>"><?= $caption; ?></a></td>
                <td><a href="../CRUD-products/detailsProduct.php?id=<?= $product_id ?>"><?= $productname; ?></a></td>
                <td><?= $start_date; ?></td>
                <td><?= $end_date; ?></td>
                <td >
                    <a href="../deal/dealDetail.php?id=<?= $dealid; ?>" class="btn btn-info">Info</a>         
              </td>
              </tr>
           
            </tbody>

          <?
            }}
          ?>
          </table>
        </div>

  </div>

<!-- Footer -->
<?php include "../footer.php"; ?>
