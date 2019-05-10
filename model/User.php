<!--
Author:    Rohit Arora; n01269796;
-->

<?php

class User
{

    // function to get list of user    
    public function getAllUsers($dbcon){
        $sql = "SELECT * FROM users";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    // function to get list of user    
    public function getAllUsersExecptAdmin($dbcon){
        $sql = "SELECT * FROM users where username != 'admin'";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }
    //function to get user id
    public function getUserId($name,$db){
        $users = $this->getAllUsers($db);
           foreach($users as $user){
                $username = $user->username;
                if(strcmp($username, $name) == 0){
                     $id = $user->id;
                     return $id;
                }        
            }
    }


    //function to get user by id
    public function getUserById($id, $db){
        $sql = "SELECT * FROM users WHERE id = :id ";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $user =  $statement->fetch(PDO::FETCH_OBJ);
        return $user;

    }

       //function to get user id by email
    public function getUserByEmail($email,$db){
        $users = $this->getAllUsers($db);
           foreach($users as $user){
                $uemail = $user->email;
                if(strcmp($uemail, $email) == 0){
                     return $user;
                }        
            }
    }

    // function to insert user    

    public function addUser($fname,$lname,$username, $address, $city, $province, $postal_code,$email, $phone_number, $password,$alternative_email,  $db) {
        $sql = "INSERT INTO users (fname, lname, username, address, city, province, postal_code,email,phone_number,password, alternative_email) 
              VALUES (:fname,:lname,:username,:address,:city,:province,:postal_code,:email,:phone_number, :password, :alternative_email) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':fname', $fname);
        $pst->bindParam(':lname', $lname);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':address', $address);
        $pst->bindParam(':city', $city);
        $pst->bindParam(':province', $province);
        $pst->bindParam(':postal_code', $postal_code);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone_number', $phone_number);
        $pst->bindParam(':password', $password);
        $pst->bindParam(':alternative_email', $alternative_email);
        $effectedRows = $pst->execute();
        return $effectedRows;
    }




    // function to delete user  
     public function deleteUser($id, $db){

        $favsql = "DELETE FROM favorites WHERE user_id = :id";
        $prepareStatement = $db->prepare($favsql);
        $prepareStatement->bindParam(':id', $id);
        $prepareStatement->execute();

        $feedsql = "DELETE FROM feedbacks WHERE user_id = :id";
        $prepareStatement = $db->prepare($feedsql);
        $prepareStatement->bindParam(':id', $id);
        $prepareStatement->execute();


        $imagesql = "DELETE FROM images WHERE client_id = :id";
        $prepareStatement = $db->prepare($imagesql);
        $prepareStatement->bindParam(':id', $id);
         $prepareStatement->execute();

        $locsql = "DELETE FROM locations WHERE user_id = :id";
        $prepareStatement = $db->prepare($locsql);
        $prepareStatement->bindParam(':id', $id);
        $prepareStatement->execute();


        $productsql = "DELETE FROM products WHERE user_id = :id";
        $prepareStatement = $db->prepare($productsql);
        $prepareStatement->bindParam(':id', $id);
        $effectedRows = $prepareStatement->execute();


        $ratingsql = "DELETE FROM ratings WHERE user_id = :id";
        $prepareStatement = $db->prepare($ratingsql);
        $prepareStatement->bindParam(':id', $id);
        $effectedRows = $prepareStatement->execute();


        $refersql = "DELETE FROM referings WHERE client_id = :id";
        $prepareStatement = $db->prepare($refersql);
        $prepareStatement->bindParam(':id', $id);
        $prepareStatement->execute();

        $membersql = "DELETE FROM transactions WHERE client_id = :id";
        $prepareStatement = $db->prepare($membersql);
        $prepareStatement->bindParam(':id', $id);
        $prepareStatement->execute();

        $sql = "DELETE FROM users WHERE id = :id";
        $prepareStatement = $db->prepare($sql);
        $prepareStatement->bindParam(':id', $id);
        $effectedRows = $prepareStatement->execute();
        return $effectedRows;
    }
   
    //valudating user by for login

    public function validateUser($name,$pass,$db) {
           $users = $this->getAllUsers($db);
           foreach($users as $user){
                $username = $user->username;
                $password = $user->password;
                if(strcmp($username, $name) == 0 && strcmp($password, $pass) == 0){
                     return true;
                }        
            }
            return false;
    }

    //validating user email  for forget passowr
       public function validateUserEmail($email,$db) {
           $users = $this->getAllUsers($db);
           foreach($users as $user){
                $uemail = $user->email;
                if(strcasecmp($uemail, $email) == 0){
                     return true;
                }        
            }
            return false;
    }
    


 

    // function to check duplicacy of user for username and email
    public function checkDuplicateUser($name,$db) {
           $users = $this->getAllUsers($db);
           foreach($users as $user){
                $username = $user->username;
                if(strcasecmp($username, $name) == 0){
                   
                     return true;
                }        
            }
            return false;
    }


    //  function to update user data 

    public function updateUser($id, $fname,$lname,$username, $address, $city, $province, $postal_code,$email, $phone_number, $alternative_email,  $db){
        $sql = "UPDATE users
                SET fname = :fname,
                lname = :lname,
                username = :username,
                address = :address,
                city = :city,
                province = :province,
                postal_code = :postal_code,
                email = :email,
                phone_number = :phone_number,
                alternative_email = :alternative_email
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':fname', $fname);
        $pst->bindParam(':lname', $lname);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':address', $address);
        $pst->bindParam(':city', $city);
        $pst->bindParam(':province', $province);
        $pst->bindParam(':postal_code', $postal_code);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone_number', $phone_number);
        $pst->bindParam(':alternative_email', $alternative_email);
        $effectedRows = $pst->execute();
        return $effectedRows;
    }


    //  function to update user password 

    public function updateUserPassword($id, $password,  $db){
        $sql = "UPDATE users
                SET password = :password
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':password', $password);
        $effectedRows = $pst->execute();
        return $effectedRows;
    }



     //function to get products by userid
    public function getAllProductsByUserId($id, $db){
        $sql = "SELECT a.id, a.name, b.title FROM products a JOIN categories b ON (a.category_id = b.id) WHERE user_id = :id ";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $products =  $statement->fetchAll(PDO::FETCH_OBJ);
        return $products;

    }
    public function getAllPLocations($dbcon){
        $sql = "SELECT CONCAT(address, ', ', city, ', ' , province) AS 'Address' FROM users";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $user = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }




}