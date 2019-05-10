<?php
session_start();

$page_title = "List Membership types";

require_once '../../model/Database.php';
require_once '../../model/membership.php';

$page_title = "List Membership Types";

include '../header.php';

$dbcon = Database::getDb();
$s = new Member();
$mymember =  $s->getAllMembers(Database::getDb());
?>

<main id="main_membershiptypes_admin">
	
	<div class="container">
		<br><br><h2>Membership Types List </h2>
		<div class="row">
			<?php foreach($mymember as $member){ ?>
			<div class="col-md-12 membershiptypes">          

				<?php   echo "<a href='membershipDetail.php?id=$member->id'>" .  $member->title  . "</a>".
						"<form action='updatemembership.php' method='post'>" .
						"<input type='hidden' value='$member->id' name='id' />".
						"<input type='submit' value='Update' name='update' class='btn btn-default '/>".
						"</form>" .
						"<form action='deletemembership.php' method='post'>" .
						"<input type='hidden' value='$member->id' name='id' />".
						"<input type='submit' value='Delete' name='delete' class='btn btn-default '/>".
						"</form>" . "<br><br>";							
				}
				?>

				<p><a href="addmembership.php">Add a new record</a></p>

			</div>
		</div>			
	</div>	
</main>

<?php include "../footer.php"; ?>


