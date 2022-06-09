<?php

require_once "connection.php";
require_once "../persistence/user.php";

class UserQuery{

    function listUsers(){
    }

    function insertUser(User $user){
        $conn = new Connection;
        $sql = "INSERT INTO `user` (`user_id`, `user_email`, `user_username`, `user_name`, `user_password`, `user_accountCreation`) VALUES (0, '".$user->getEmail()."', '".$user->getUsername()."', '".$user->getName()."', '".$user->getPassword()."', now());";
        $conn->insertIntoDB($sql);
    }

    function getUserByID(int $id){
        $conn = new Connection;
        $sql = "SELECT * FROM `user` WHERE `user_id`= ".$id.";";
        $result = $conn->selectFromBD($sql);
        $row = $result->fetch_assoc();

        $user = new User();
        $user = $this->rowToObject($row);

        return $user;
    }

    function getUserByEmail(string $email){
        $conn = new Connection;
        $sql = "SELECT * FROM `user` WHERE `user_email`= '".$email."';";
        $result = $conn->selectFromBD($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $user = new User();
            $user = $this->rowToObject($row);
        } else {
            $user=NULL;
        }
        
        if($user==NULL){
            return false;
        } else {
            return $user;
        };
    }

    function getUserByUsername(string $username){
        $conn = new Connection;
        $sql = "SELECT * FROM `user` WHERE `user_username`= '".$username."';";
        $result = $conn->selectFromBD($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $user = new User();
            $user = $this->rowToObject($row);
        } else {
            $user=NULL;
        }

        if($user==NULL){
            return false;
        } else {
            return $user;
        };
    }

    private function rowToObject($row){
        $user = new User();
        $user->setId($row["user_id"]);
        $user->setEmail($row["user_email"]);
        $user->setUsername($row["user_username"]);
        $user->setName($row["user_name"]);
        $user->setPassword($row["user_password"]);
        $user->setAccountDateCreation($row["user_accountCreation"]);

        return $user;
    }

}

?>