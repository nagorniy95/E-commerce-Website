
<h1> Azeb's features </h1>


<p> 1.  Referals (Recommend our site </p>
<?php

$page_title = "Azeb features";
echo "<a href='refer.php'>recommend our site</a><br><br>";
echo "<a href='listReferals.php'>List of Referals</a><br><br>";

?>

<p> 2. Membership </p>
	<p> a. Membership Levels </p>
	<?php
	echo "<a href='../membershiplevels/addmembership.php'>Add Membership Types</a><br><br>";
	echo "<a href='../membershiplevels/listmembership.php'>list Membership Types<a><br><br>";
	?>
	<p> b. Membership Payments</p>
	<?php
	echo "<a href='../payment/listpayments.php'>list Membership payments<a><br><br>";
	echo "<a href='../payment/addpayment.php'>Pay for  Membership <a><br><br>";
	?>
<p> 3. Search by Keyword </p>
	<?php
	echo "<a href='../searchbykeyword/search.php'>Search by Key Word</a><br><br>";
	?>
	
<p> 4.Login/Log out </p>
	<?php
	echo "<a href='../login-register/login.php'>Login</a><br><br>";
	echo "<a href='../login-register/userprofile.php'>Log out</a><br><br>";
	?>


	