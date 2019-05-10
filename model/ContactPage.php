<?php 

class ContactPage
{
	
	public function getContactPageById($id, $db){
        $sql = "SELECT * FROM contact_page WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $result =  $pst->fetch(PDO::FETCH_OBJ);
        return $result;
    }
	
	    public function getAllContactPage($dbcon){
        $sql = "SELECT * FROM contact_page";
        $pst = $dbcon->prepare($sql);
        $pst->execute(); 
        $result = $pst->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } 
	
    //add data to database
    public function addContactPage($email, $phone_number, $location, $db){
        $sql = "INSERT INTO contact_page (email, phone_number, location )
                VALUES (:email, :phone_number, :location)";
        $pst = $db->prepare($sql); 
		
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone_number', $phone_number);
		$pst->bindParam(':location', $location);
		
        $result = $pst->execute(); 
        return $result;
    } 
    
    public function updateContactPage($id, $email, $phone_number, $location, $db){
        $sql = "UPDATE contact_page
                SET email = :email,
                phone_number = :phone_number,
				location = :location
                WHERE id = :id";
				
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone_number', $phone_number);
		$pst->bindParam(':location', $location);
		
        $result = $pst->execute();
        return $result;
    } 
    
    public function deleteContactPage($id, $db){
        $sql = "DELETE FROM contact_page WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $result = $pst->execute();
        return $result;
    }
    
} 