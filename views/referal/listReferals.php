<?php
session_start();


$page_title = "List Referals";

require_once '../../model/Database.php';
require_once '../../model/referal.php';

 include '../header.php';

$dbcon = Database::getDb();
$s = new Referal();
$myref =  $s->getAllReferals(Database::getDb());
?>

<main id="main_referal_admin">
	
    <div class="container">
	</br></br><h2>Referals List</h2>
        <div class="row">
			
			<?php foreach($myref as $referal){ ?>
		
            <div class="col-12">
	
				<?php echo "<a href='referalDetail.php?id=$referal->id'>" .  $referal->friend_name  . "</a>".
					"<form action='updateReferal.php' method='post'>" .
					"<input type='hidden' value='$referal->id' name='id' />".
					"<input type='submit' value='Update' name='update' class='btn btn-default '/>".
					"</form>" .
					"<form action='deleteReferal.php' method='post'>" .
					"<input type='hidden' value='$referal->id' name='id' />".
					"<input type='submit' value='Delete' name='delete' class='btn btn-default '/>".
					"</form>" . "<br><br>";	
				}
				?>
				
			
			</div>
		</div>
	</div>
</main>

<?php include "../footer.php"; ?>
















