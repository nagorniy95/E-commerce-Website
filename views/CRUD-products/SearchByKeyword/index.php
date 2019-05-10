
<!DOCTYPE html>
<head>
	<title> SEARCH</title>
	<link rel="stylesheet" href="../../css/searchbykeyword.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script type="text/javascript">
	function searchq() {
		var searchTxt = $("input[name='search']").val();
		$.post("search.php", {searchVal: searchTxt}, function(output) {
			$("#output").html(output);
		});
	}
	
	</script>
</head>
<body>
<div id="ak-search_wrapper">
   <div class="container">
	<div class="row">
		<div class="col-12">
			<form action="index.php" method = "post">
				<h2> Search </h2>				
				<input type="text" class="ak_inputfield" name="search" placeholder="Search for products ..." onkeydown="searchq();"/>	
				<input type="submit"  value="Search" />							 
				 
			</form>		
			<div id="output">
			</div>
		</div>
	</div>
</div>



</body>
</html>




<!--For example... Just like this? TO SEARCH MULTIPLE TABLES
$sql= mysql_query("SELECT wname, url, title, keywords, description, city, country, category FROM directory
 WHERE city LIKE '%$search%' ¦¦ wname LIKE '%$search%' ¦¦ title LIKE '%$search%' ¦¦ keywords LIKE '%$search%'
 ¦¦ description LIKE '%$search%' ¦¦ country LIKE '%$search%' ¦¦ category LIKE '%$search%' ¦¦ url LIKE '%$search%' JOIN SELECT * FROM list WHERE city LIKE '%$search%'", $db);
 -->
 
 <?php include "../footer.php"; ?>