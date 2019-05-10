<?php
$page_title = "Recommended products";
session_start();
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Product.php';

$dbcon = Database::getDb();
$p = new Product();
$product =  $p->getRandomProducts(Database::getDb());

?>
<main id="main_searchFaqAdmin">
        
        <div class="container">
		</div>
		<div class="container">
		<h2>Products You Would Like...</h2>
            <div>
			 <?php foreach($product as $product){ 
                 
                echo "<a href='detailsProduct.php?id=$product->id'>" . "</br>Name:". $product->name  . "</a>". "Description:" .$product->description . "<input type='hidden' value='$product->id' name='id' /></br></br>";
}   
?>
		  </div>
      </div>
</main>
<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>