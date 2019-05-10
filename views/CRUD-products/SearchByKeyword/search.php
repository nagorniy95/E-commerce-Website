<?php
require_once '../../model/Database.php';
$page_title = "Search by Keyword";

include '../header.php';



/*based on search input searches in products table and displays the results.  
if no entry and click submit - you must enter your search message appears
if canot find the search item in database = there was no search results message appears.
if finds the search item - displays all items
issue: it doesn't find some items that are in the database ex. Audi & iphone are in name column in database but cannot find them, and doesn't display any message.

*/


$output  = $res = "";

//collect posting of the script
if(isset($_POST["searchVal"])) {
	var_dump($_POST);
	
		$searchq = $_POST['searchVal'];
		//preg_replace items we want to allow goes inside #[]#, the i after # upper case or lower letter, anything that is not in #[]# replace it with "" blank
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq); //remove everything that is not numbers & letters and repplaces it with blank
		$db = Database::getDb();
		
		
		
		$res = $db->query("SELECT * FROM products WHERE name LIKE '%$searchq%' OR description LIKE '%$searchq%'");
		var_dump($res);
		
		
		
		$count = $res->fetchColumn();
		var_dump($count);
		
		
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
echo ($output);
?>
