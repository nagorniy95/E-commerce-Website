<!--
Author:    Rohit Arora; n01269796;
-->

<?php 

require_once '../../model/Database.php';
require_once '../../model/Deal.php';
require_once '../../model/User.php';
require_once '../../model/Product.php';
require_once "function.php";
session_start();
$page_title = "edit deal";
if(isset($_SESSION['id'])){

	 $dealid = $_GET['id'];
    $db = Database::getDb();
    $d = new Deal();
    $deal = $d->getDealById($dealid, $db);
    $caption = $deal->caption;
    $detail = $deal->detail;
  	$start_date = $deal->start_date;
    $st = strtotime($start_date);
    $start_date = date('d-m-Y',$st);

    $end_date = $deal->end_date;
    // $et = strtotime($end_date);
    // $end_date = date('d-m-Y',$et);

  	$product_id = $deal->product_id;

  	$p = new Product();
  	$product = $p->getProductById($product_id,$db);
  	$productname = $product->name;
    $user_id = $product->user_id;
    if($_SESSION['id'] != $user_id){
      header("Location: ../login-register/userProfile.php");
    }
	 
	$msg = "";
	$captionerr = $detailerr = $end_dateerr = "";


 //waiting for user add button submit
    if(isset($_POST['dealEdit'])){
       $caption = $_POST['caption'];  
       $end_date = $_POST['end_date'];
       $detail = $_POST['detail'];
      // checking validation
      $valid = validateEditDeal($captionerr,$detailerr,$end_dateerr, $caption,$detail,$end_date);
       if($valid)
       {
           $effectedRow = $d->editDeal($dealid,$caption,$detail,$end_date,$db);
           if($effectedRow){
               $msg = "Thanks!! your Deal have been sucessfully edited";
               
           } else {
                //header("Location: customerr.php");
               $msg =  "Error Occured Please try again";
           }

        }
	}
}else{
  header("Location: ../login-register/login.php");
}

include "../header.php"; 
 ?>
<?= $msg;?>

  

<div class="bootstrap-iso" id="forgetpass">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form class="form-horizontal" method="post">
      <legend><h3>Edit Deal Information</h3></legend> 
     <div class="form-group ">
      <label class="control-label col-sm-3 requiredField" for="caption">
       Deal Title
      </label>
      <div class="col-sm-8">
       <input class="form-control" id="caption" name="caption" type="text" value="<?= $caption;?>" />
       <span  style="color: red"> <?= $captionerr;?></span>
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-3 requiredField" for="detail">
       About Deal
      </label>
      <div class="col-sm-8">
       <textarea class="form-control" id="detail" name="detail" rows="5"><?= $detail;?></textarea>
       <span  style="color: red"> <?= $detailerr;?></span>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-3 requiredField" for="date">
       Start Date
      </label>
      <div class="col-sm-8">
       <div class="input-group">
      		<?= $start_date;?>
       </div> 
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-3 requiredField" for="date">
       End Date
      </label>
      <div class="col-sm-8">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control form-control" id="end_date" name="end_date" placeholder="YYYY/MM/DD" type="text" value="<?= $end_date;?>" />
       </div><span  style="color: red"> <?= $end_dateerr;?></span>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-3 requiredField" for="caption">
       Product
      </label>
      <div class="col-sm-8">
        <?= $productname?>
      </div>
     </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <button class="btn btn-primary " name="dealEdit" type="submit">
        Submit
       </button>
       <span><a href="../login-register/userProfile.php" class="btn btn-primary">Back to profile</a> </span>
       <span><a href="deleteDeal.php?id=<?=$dealid?>" class="btn btn-danger">Delete</a> </span>
      </div>
     </div>
    </form>
   </div>
   <img class="col-md-6" style="height: 10%;width: 10%;" src="../../img/deal.jpg" alt="deal image">
  </div>
 </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var start_date=$('#start_date'); //our date input has the name "date"
		var end_date=$('#end_date');
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		start_date.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
		end_date.datepicker({
			format: 'yyyy-mm-dd',
			//container: container,
			todayHighlight: true,
			autoclose: true,
		})

		$("form :input").attr("autocomplete", "off");
	})
</script>





<!-- FOOTER -->
<?php include "../footer.php"; ?>