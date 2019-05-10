<?php
require_once '../../model/Database.php';
$page_title = "Search by Keyword";

include '../header.php';

$output  = $res = "";

//collect posting of the script
if(isset($_POST["search"])) {
	
	
	if(!empty($_POST["search"]))
	{
		$searchq = $_POST['search'];
		$db = Database::getDb();		
		
		$res = $db->query("SELECT * FROM products WHERE name LIKE '%$searchq%' OR description LIKE '%$searchq%'");
		//var_dump($res);
		
		
		
		$count = $res->rowCount();
		//var_dump($count);
		
		
		if($count == 0) {
			$output = "There was no search results!";
		}
		else
		{
			//this is where we collect everything in the row
			while ($row = $res->fetch(PDO::FETCH_ASSOC))  {
			
				$name = $row['name'];
				$desc = $row['description'];
				//$catid = $row['category_id'];
				
				
				
				$output .= '<div> '.$name.' ' . ' ' .' ' . $desc .'</div>';  //.= to concatinate every output
				
			}	
		
		}
	}else{
		$output= "you must enter your search";
	}
}




?>
<!DOCTYPE html>
<head>
	<title> SEARCH</title>
	<link rel="stylesheet" href="../../css/searchbykeyword.css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<div id="ak-search_wrapper">
   <div class="container">
	<div class="row">
		<div class="col-12">
			<form action="search.php" method = "post">
				<h2> Search </h2>				
				<input type="text" class="ak_inputfield" name="search" placeholder="Search for products ..."/>	
				<input type="submit"  value="Search" />							 
				 
			</form>		
			<?php echo ("$output"); ?> <!--prints the output concatinated and stored in the output variable-->
		</div>
	</div>
</div>



</body>
</html>





 
 <?php include "../footer.php"; ?>