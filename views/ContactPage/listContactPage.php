
<?php
require_once '../../model/Database.php';
require_once '../../model/ContactPage.php';

$dbcon = Database::getDb();
$c = new ContactPage();
$mycontact = $c->getAllContactPage(Database::getDb());

?>

<?php
echo "<table>";
foreach($mycontact as $contact){
    echo"<tr><td><a href='detailContact.php?id=$contact->id'>" .  $contact->email  . "</a></td>".
	    "<td><form action='updateContactPage.php' method='post'>" .
        "<input type='hidden' value='$contact->id' name='id' />".
        "<input type='submit' value='Update' name='update' />".
        "</form></td>" .
        "<td><form action='deleteContactPage.php' method='post'>" .
        "<input type='hidden' value='$contact->id' name='id' />".
        "<input type='submit' value='Delete' name='delete' />".
        "</form></td>" .
        "</tr>";
}
echo "</table>";
