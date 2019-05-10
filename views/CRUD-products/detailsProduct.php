<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/Product.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $p = new Product();
    $product = $p->getProductById($id, $dbcon);
//    var_dump($product);
    $rating = $p->RatingList($id, $dbcon);
//    var_dump($rating);
//    $categories = $p->getCategories($id, $dbcon);
  //  $rp =  $p->getRandomProducts(Database::getDb());

}
if(isset($_GET['addToFavorites'])){
    $product_id = $_GET['id'];
    $db = Database::getDb();
    $c = new Product();
    $my_data = $c->FavoritesAdd($_SESSION['id'], $product_id, $db);
}
if(isset($_GET['addToRating'])){
    $product_id = $_GET['id'];
    $db = Database::getDb();
    $c = new Product();
    $ratingAdd = $c->RatingAdd($_SESSION['id'], $product_id, $_GET['star'], $db);
}
?>

<?php
$page_title = "Details Product";
include dirname( __FILE__) . "../../header.php";
 ?>

<div class="content details-product">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="img-wrapper">
                    <?php echo "<img class='img-responsive' alt='product image' src=" . $product->img_path . ">" ?>

                    <a class="button" href="#">Get it</a>
<!-- ====================== Add to Favorites; Artem ====================== -->
                    <?php if(isset($_SESSION['username'])){ ?>
                    <form action="" method="get">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="submit" name="addToFavorites" value="Add to Favourites" class="button-fav" />
                    </form>
                    <?php } ?>
<!-- ====================== Reting system; Artem ====================== -->
                    <div class="currentRating"><?php echo $rating['avg_rating']; ?></div>
                    <?php if(isset($_SESSION['username'])){ ?>
                    <form action="" method="get">
                        <fieldset class="ratings">
                            <legend>Please rate</legend>
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <input type="radio" name="star" id="rating1" value="1"><label for="rating1"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating2" value="2"><label for="rating2"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating3" value="3"><label for="rating3"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating4" value="5"><label for="rating4"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating5" value="5"><label for="rating5"><i class="fas fa-star"></i></i></label>
                            <input type="submit" name="addToRating" value="Add to Rating" class="addToRating-button" />
                        </fieldset>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="product-title"><?php echo $product->name; ?></h2>
                <p class="author-label">Author:</p>
                <!-- <a class="author nlink" href="#">Nick Vakulov</a> -->
                <?php echo "<a class='dib' href=../login-register/userProfile.php>" . $product->fname ." ". $product->lname . "</a>"; ?> 
                <p class="category-label">Category:</p>
                <a class="category nlink" href="../SearchCategory/searchResult.php?id=<?php echo $product->category_id; ?>"><?php echo  $product->title; ?></a> <!-- Artem; Search by Category feature -->
                <p><?php echo $product->description; ?></p>
            </div>
        </div>
    </div>
 


<!-- rohit deals feature list of this product-->
<?php
require_once '../../model/Deal.php';
require_once '../../model/User.php';
//after getting ptoduct id
if(isset($_GET['id'])){
$d = new Deal();
$deals =  $d->getDealByProductId($id,$dbcon);
}
?>
           <div class="text-center">
                <h3 >Deals</h3>
                <?php 
                //validating for login user and if the login user is the owner of this product
                if(isset($_SESSION['id']) && $_SESSION['id'] == $product->user_id){
                ?>
                <span>
                    <a href="../deal/addDeal.php?productid=<?= $id; ?>" class="btn btn-info " style="background-color:#fa9405 ">Add Deal</a>
                </span>
                <?php
                    }
                ?>
            </div>
    <div class="row">
        <?php
             foreach($deals as $deal){
              $dealid = $deal->id;
              $caption = $deal->caption;
              $start_date = $deal->start_date;
              $end_date = $deal->end_date;
         ?>
        <div class="col-md-4">

             <div style="border: 1px solid; padding: 10px; box-shadow: 5px 10px #fa9405; margin-bottom: 10px;">
                <div class="row">
                     <div class="col-md-8 text-center">
                        <a href="../deal/dealDetail.php?id=<?= $dealid; ?>"><?= $caption; ?></a>
                     </div>
                  </div> 
                  <div class="row"> 
                     <div class="col-md-6">
                        <?= "Starting date : ". $start_date; ?>
                     </div>
                     <div class="col-md-6">
                        <?= "End date : ". $end_date; ?>
                     </div>
                </div>
            </div>
       </div>     
       
         <?php } ?>  

    </div>
<!--deal feauter ends -->

<!-- rohit Feedback feature list of this product-->
<?php
require_once '../../model/Feedback.php';
require_once '../../model/User.php';

//after getting product id
if(isset($_GET['id'])){
$f = new Feedback();  
$feedbacks =  $f->getFeedbackByProductId($id,$dbcon);
}
?>
  
   
    <div>
        <div class="text-center">
            <h3>Feedbacks</h3>
            <span>
                <a href="../feedback/addfeedback.php?id=<?= $id; ?>" class="btn btn-info " style="background-color:#fa9405 ">Add a feedback</a>
            </span>
        </div>
        <?php
             foreach($feedbacks as $feedback){
                $user_id = $feedback->user_id;
                $ud = new User();
                $user = $ud->getUserById($user_id, $dbcon);
                $username = $user->fname . " " . $user->lname;
                $title = $feedback->title;
                $feed = $feedback->message;
            ?>
            <div style="border: 1px solid; padding: 10px; box-shadow: 5px 10px #fa9405; margin-bottom: 10px;">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-center"><strong><?= $title; ?></strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <span><i class="glyphicon glyphicon-user"></i> <?= $username; ?></span>
                    </div>
                      <div class="col-md-8">  
                        <p><?= $feed; ?></p> 
                    </div>
                </div>
            </div>
       
         <?php } ?>          
    </div>
<!-- end of rohit feature-->
<?php
require_once '../../model/Product.php';

//after getting product id
if(isset($_GET['id'])){
$r = new Product();  
$rps =  $r->getRandomProducts($id,$dbcon);
}
?>
<div class="container">
<h2><a href="recommendedProducts.php">Products You Would Like...</a></h2>
                <!-- <div class="row">
                    <?php foreach($rps as $rp){ ?>
                    <div class="col-md-4" title="<?php echo $rp->name ?>">
                        <a href="detailsProduct.php?id=<?php echo $rp->id ?>">
                            <?php echo $rp->name ?>
							
                        </a>
						<p><?php echo $rp->description ?></p>
                    </div>
                    <?php } ?>
           </div> -->
     </div>
</div>
<?php
$page_title = "Update Products";
//include dirname( __FILE__) "../../footer.php";
?>